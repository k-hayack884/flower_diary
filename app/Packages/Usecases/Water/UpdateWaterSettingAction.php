<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingID;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\CreateWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\UpdateWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use PHPUnit\Exception;

class UpdateWaterSettingAction
{
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    public function __invoke(
        UpdateWaterSettingRequest $createWaterSettingRequest,
        string                    $waterSettingId
    ): WaterSettingWrapDto
    {
        $requestArray = [
            'waterSetting.months' => $createWaterSettingRequest->getMonths(),
            'waterSetting.note' => $createWaterSettingRequest->getNote(),
            'waterSetting.amount' => $createWaterSettingRequest->getAmount(),
            'waterSetting.times' => $createWaterSettingRequest->getWateringTimes(),
            'waterSetting.interval' => $createWaterSettingRequest->getWateringInterval(),
            'waterSetting.alert_time' => $createWaterSettingRequest->getAlertTimes(),
        ];

        $waterSetting = $this->waterSettingRepository->findById(new WaterSettingID($waterSettingId));

        $updateMonths = $requestArray['waterSetting.months'];
        $updateNote = $waterSetting->getWaterNote()->update($requestArray['waterSetting.note']);
        $updateAmount = new WaterAmount($requestArray['waterSetting.amount']);
        $updateWateringTimes = new WateringTimes($requestArray['waterSetting.times']);
        $updateWateringInterval = new WateringInterval($requestArray['waterSetting.interval']);
        $updateAlertTimes =$requestArray['waterSetting.alert_time'];

        try {
            $updatewaterSetting = new TarmWaterSetting(
                new WaterSettingID($waterSettingId),
                $updateMonths,
                $updateNote,
                $updateAmount,
                $updateWateringTimes,
                $updateWateringInterval,
                $updateAlertTimes
            );
            $this->waterSettingRepository->save($updatewaterSetting);
        } catch (Exception $e) {
            throw  $e;
        }
        return WaterSettingsDtoFactory::create($updatewaterSetting);
    }
}
