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
use App\Packages\Presentations\Requests\Water\CreateWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\UpdateWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class UpdateWaterSettingAction
{
    private WaterSettingRepositoryInterface $waterSettingRepository;

    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
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
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return WaterSettingsDtoFactory::create($updateWaterSetting);
    }
}
