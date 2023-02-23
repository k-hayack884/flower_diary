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
use PHPUnit\Exception;

class UpdateWaterSettingAction
{
    private WaterSettingRepositoryInterface $waterSettingRepository;

    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    /**
     * @param UpdateWaterSettingRequest $createWaterSettingRequest
     * @return WaterSettingWrapDto
     * @throws Exception
     */
    public function __invoke(
        UpdateWaterSettingRequest $createWaterSettingRequest,
    ): WaterSettingWrapDto
    {
        $waterSettingId = $createWaterSettingRequest->getId();
        $waterSettingMonths = $createWaterSettingRequest->getMonths();
        $waterSettingNote = $createWaterSettingRequest->getNote();
        $waterSettingAmount = $createWaterSettingRequest->getAmount();
        $waterSettingTimes = $createWaterSettingRequest->getWateringTimes();
        $waterSettingInterval = $createWaterSettingRequest->getWateringInterval();
        $waterSettingAlertTimes = $createWaterSettingRequest->getAlertTimes();

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
            $this->waterSettingRepository->save($waterSettingCollection);
        } catch (Exception $e) {
            throw  $e;
        }

        return WaterSettingsDtoFactory::create($updateWaterSetting);
    }
}
