<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\GetWaterSettingsRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingDto;
use App\Packages\Usecases\Dto\Water\WaterSettingsWrapDto;
use Illuminate\Support\Facades\Log;

class GetWaterSettingsAction
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
     * @param GetWaterSettingsRequest $getWaterSettingRequest
     * @return WaterSettingsWrapDto
     */
    public function __invoke(GetWaterSettingsRequest $getWaterSettingRequest
    ): WaterSettingsWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $checkSeatId=new CheckSeatId($getWaterSettingRequest->getCheckSeatId());
        $waterSettingCollection = $this->waterSettingRepository->findByCheckSeatId($checkSeatId);

        $waterSettingDtos = [];

        foreach ($waterSettingCollection as $waterSetting) {
            $waterSettingDtos[] = new WaterSettingDto(
                $waterSetting->getWaterSettingId()->getId(),
                $waterSetting->getMonths(),
                $waterSetting->getWaterNote()->getValue(),
                $waterSetting->getWaterAmount()->getValue(),
                $waterSetting->getWateringTimes()->getValue(),
                $waterSetting->getWateringInterval()->getValue(),
                $waterSetting->getAlertTimes()
            );
        }
        Log::info(__METHOD__, ['終了']);

        return new WaterSettingsWrapDto($waterSettingDtos);
    }
}
