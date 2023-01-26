<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\DeleteWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\ResetWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use PHPUnit\Exception;

class ResetWaterSettingAction
{
    private WaterSettingRepositoryInterface $waterSettingRepository;

    /**
     * @param WaterSettingRepositoryInterface $waterSettingRepository
     */
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    /**
     * @param DeleteWaterSettingRequest $deleteWaterSettingRequest
     * @param string $waterSettingIdValue
     * @return void
     * @throws Exception
     */

    public function __invoke(
        ResetWaterSettingRequest $deleteWaterSettingRequest,
        string                    $waterSettingIdValue
    ): WaterSettingWrapDto
    {
        $waterSetting = $this->waterSettingRepository->findById(new WaterSettingId($waterSettingIdValue));

        $resetMonths = MonthsWaterSetting::RESET;
        $resetNote = $waterSetting->getWaterNote()->update(null);
        $resetAmount = WaterAmount::settingModerateAmount();
        $resetWateringTimes = new WateringTimes(1);
        $resetWateringInterval = new WateringInterval(1);
        try {
            $resetWaterSetting = new MonthsWaterSetting(
                new WaterSettingId($waterSettingIdValue),
                $resetMonths,
                $resetNote,
                $resetAmount,
                $resetWateringTimes,
                $resetWateringInterval,
            );
            $waterSettingCollection=new WaterSettingCollection();
            $this->waterSettingRepository->save($waterSettingCollection);
        } catch (Exception $e) {
            throw  $e;
        }
        return WaterSettingsDtoFactory::create($resetWaterSetting);
    }

}
