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
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use PHPUnit\Exception;

class CreateWaterSettingAction
{
    /**
     * @var WaterSettingRepositoryInterface
     */
    private WaterSettingRepositoryInterface $waterSettingRepository;

    /**
     * @param WaterSettingRepositoryInterface $waterSettingRepository
     */
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
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
        $waterSettingMonths = $createWaterSettingRequest->getMonths();
        $waterSettingNote = $createWaterSettingRequest->getNote();
        $waterSettingAmount = $createWaterSettingRequest->getAmount();
        $waterSettingTimes = $createWaterSettingRequest->getWateringTimes();
        $waterSettingInterval = $createWaterSettingRequest->getWateringInterval();
        try {
            $waterSettings = new MonthsWaterSetting(
                new WaterSettingId(),
                $waterSettingMonths,
                new WaterNote($waterSettingNote),
                new WaterAmount($waterSettingAmount),
                new WateringTimes($waterSettingTimes),
                new WateringInterval($waterSettingInterval)
            );
            $waterSettingCollection = new WaterSettingCollection();
            $this->waterSettingRepository->save($waterSettingCollection);
        } catch (Exception $e) {
            throw  $e;
        }

        return WaterSettingsDtoFactory::create($waterSettings);
    }
}
