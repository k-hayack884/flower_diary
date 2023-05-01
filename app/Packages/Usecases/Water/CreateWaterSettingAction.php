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
use App\Packages\infrastructures\Care\CareWaterRepository;
use App\Packages\infrastructures\Shared\TransactionInterface;
use App\Packages\Presentations\Requests\Water\CreateWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

class CreateWaterSettingAction
{
    /**
     * @var WaterSettingRepositoryInterface
     */
    private WaterSettingRepositoryInterface $waterSettingRepository;
    private CareWaterRepository $careRepository;
    private TransactionInterface $transaction;


    /**
     * @param WaterSettingRepositoryInterface $waterSettingRepository
     */
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository, CareWaterRepository $careRepository, TransactionInterface $transaction)
    {
        $this->waterSettingRepository = $waterSettingRepository;
        $this->careRepository=$careRepository;
        $this->transaction=$transaction;
    }

    /**
     * @param CreateWaterSettingRequest $createWaterSettingRequest
     * @return WaterSettingWrapDto
     * @throws Exception
     */
    public function __invoke(
        CreateWaterSettingRequest $createWaterSettingRequest
    ): WaterSettingWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $waterSettingMonths = $createWaterSettingRequest->getMonths();
        $waterSettingNote = $createWaterSettingRequest->getNote();
        $waterSettingAmount = $createWaterSettingRequest->getAmount();
        $waterSettingTimes = $createWaterSettingRequest->getWateringTimes();
        $waterSettingInterval = $createWaterSettingRequest->getWateringInterval();
        $alertTimes=$createWaterSettingRequest->getAlertTimes();
        $checkSeatId=$createWaterSettingRequest->getCheckSeatId();

        try {
            $this->transaction->begin();
            $waterSetting = new MonthsWaterSetting(
                new WaterSettingId(),
                $waterSettingMonths,
                new WaterNote($waterSettingNote),
                new WaterAmount($waterSettingAmount),
                new WateringTimes($waterSettingTimes),
                new WateringInterval($waterSettingInterval),
                $alertTimes
            );
            $waterSettingCollection = new WaterSettingCollection();
            $waterSettingCollection->addSetting($waterSetting);
            $this->waterSettingRepository->save($waterSettingCollection,$checkSeatId);

            $this->careRepository->save($waterSettingCollection);

            $this->transaction->commit();
            Session::flash('successMessage', '登録に成功しました');

        } catch (\DomainException $e) {
            $this->transaction->rollback();
            Log::error(__METHOD__, ['エラー']);
            Session::flash('failMessage', '登録に失敗しました');

            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return WaterSettingsDtoFactory::create($waterSetting);
    }
}
