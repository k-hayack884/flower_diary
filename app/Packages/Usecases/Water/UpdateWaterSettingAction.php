<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\infrastructures\Care\CareRepository;
use App\Packages\infrastructures\Shared\TransactionInterface;
use App\Packages\Presentations\Requests\Water\CreateWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\UpdateWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

class UpdateWaterSettingAction
{
    private WaterSettingRepositoryInterface $waterSettingRepository;
    private CareRepository $careRepository;
    private TransactionInterface $transaction;

    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository,CareRepository $careRepository,TransactionInterface $transaction)
    {
        $this->waterSettingRepository = $waterSettingRepository;
        $this->careRepository=$careRepository;
        $this->transaction=$transaction;
    }

    /**
     * @param UpdateWaterSettingRequest $updateWaterSettingRequest
     * @return WaterSettingWrapDto
     */
    public function __invoke(
        UpdateWaterSettingRequest $updateWaterSettingRequest,
    ): WaterSettingWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $waterSettingId = $updateWaterSettingRequest->getId();
        $checkSeatId=$updateWaterSettingRequest->getCheckSeatId();

        $waterSettingMonths = $updateWaterSettingRequest->getMonths();
        $waterSettingNote = $updateWaterSettingRequest->getNote();
        $waterSettingAmount = $updateWaterSettingRequest->getAmount();
        $waterSettingTimes = $updateWaterSettingRequest->getWateringTimes();
        $waterSettingInterval = $updateWaterSettingRequest->getWateringInterval();
        $waterSettingAlertTimes = $updateWaterSettingRequest->getAlertTimes();

        $waterSetting = $this->waterSettingRepository->findById(new WaterSettingId($waterSettingId));
        $updateNote = $waterSetting->getWaterNote()->update($waterSettingNote);

        try {
            $this->transaction->begin();
            $updateWaterSetting = new MonthsWaterSetting(
                new WaterSettingId($waterSettingId),
                $waterSettingMonths,
                $updateNote,
                new WaterAmount($waterSettingAmount),
                new WateringTimes($waterSettingTimes),
                new WateringInterval($waterSettingInterval),
                $waterSettingAlertTimes
            );
            $waterSettingCollection = new WaterSettingCollection();
            $waterSettingCollection->addSetting($updateWaterSetting);
            $this->waterSettingRepository->save($waterSettingCollection,$checkSeatId);

            $this->careRepository->save($waterSettingCollection);

            $this->transaction->commit();
            Session::flash('successMessage', '編集に成功しました');

        } catch (\DomainException $e) {
            $this->transaction->rollback();
            Log::error(__METHOD__, ['エラー']);
            Session::flash('failMessage', '編集に失敗しました');

            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return WaterSettingsDtoFactory::create($updateWaterSetting);
    }
}
