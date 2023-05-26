<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\infrastructures\Care\CareWaterRepository;
use App\Packages\infrastructures\Shared\TransactionInterface;
use App\Packages\Presentations\Requests\Water\UpdateWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UpdateWaterSettingAction
{
    /**
     * @var WaterSettingRepositoryInterface
     */
    private WaterSettingRepositoryInterface $waterSettingRepository;
    /**
     * @var CareWaterRepository
     */
    private CareWaterRepository $careRepository;
    /**
     * @var TransactionInterface
     */
    private TransactionInterface $transaction;

    /**
     * @param WaterSettingRepositoryInterface $waterSettingRepository
     * @param CareWaterRepository $careRepository
     * @param TransactionInterface $transaction
     */
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository, CareWaterRepository $careRepository, TransactionInterface $transaction)
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

        } catch (\DomainException $e) {
            $this->transaction->rollback();
            Log::error(__METHOD__, ['エラー']);

            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return WaterSettingsDtoFactory::create($updateWaterSetting);
    }
}
