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
     * @param ResetWaterSettingRequest $deleteWaterSettingRequest
     * @return WaterSettingWrapDto
     * @throws Exception
     */
    public function __invoke(
        ResetWaterSettingRequest $deleteWaterSettingRequest,
    ): WaterSettingWrapDto
    {
        $waterSettingId = $deleteWaterSettingRequest->getId();

        $waterSetting=$this->waterSettingRepository->findById(new WaterSettingId($waterSettingId));
        $resetMonths = MonthsWaterSetting::RESET;
        $resetNote = $waterSetting->getWaterNote()->update(null);
        $resetAmount = WaterAmount::settingModerateAmount();
        $resetWateringTimes = new WateringTimes(1);
        $resetWateringInterval = new WateringInterval(1);
        try {
            $resetWaterSetting =
                new MonthsWaterSetting(
                new WaterSettingId($waterSettingId),
                $resetMonths,
                $resetNote,
                $resetAmount,
                $resetWateringTimes,
                $resetWateringInterval,
            );
            $waterSettingCollection=new WaterSettingCollection();
            $this->waterSettingRepository->save($waterSettingCollection);
        } catch (\DomainException $e) {
            abort(400,$e);
        }
        return WaterSettingsDtoFactory::create($resetWaterSetting);
    }

}
