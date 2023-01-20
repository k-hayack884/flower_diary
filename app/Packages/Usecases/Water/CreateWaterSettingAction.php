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
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use PHPUnit\Exception;

class CreateWaterSettingAction
{
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    public function __invoke(
        CreateWaterSettingRequest $createWaterSettingRequest
    ): WaterSettingWrapDto
    {
        $requestArray = [
            'waterSetting.months' => $createWaterSettingRequest->getMonths(),
            'waterSetting.note' => $createWaterSettingRequest->getNote(),
            'waterSetting.amount' => $createWaterSettingRequest->getAmount(),
            'waterSetting.times' => $createWaterSettingRequest->getWateringTimes(),
            'waterSetting.interval' => $createWaterSettingRequest->getWateringInterval()
        ];
        try {
            $waterSettingId = new WaterSettingID();
            $waterSettingMonths = $requestArray['waterSetting.months'];
            $waterSettingNote = new WaterNote($requestArray['waterSetting.note']);
            $waterSettingAmount = new WaterAmount($requestArray['waterSetting.amount']);
            $waterSettingTimes = new WateringTimes($requestArray['waterSetting.times']);
            $waterSettingInterval = new WateringInterval($requestArray['waterSetting.interval']);

            $waterSetting = new TarmWaterSetting(
                $waterSettingId,
                $waterSettingMonths,
                $waterSettingNote,
                $waterSettingAmount,
                $waterSettingTimes,
                $waterSettingInterval
            );
            $this->waterSettingRepository->save($waterSetting);
        } catch (Exception $e) {
            throw  $e;
        }
        return WaterSettingsDtoFactory::create($waterSetting);
    }
}
