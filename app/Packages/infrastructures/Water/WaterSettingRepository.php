<?php

namespace App\Packages\infrastructures\Water;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;

class WaterSettingRepository implements \App\Packages\Domains\Water\WaterSettingRepositoryInterface
{

    public function find(): array
    {
        $waterSettings = [];
        $allWaterSettings = \App\Models\WaterSetting::all();
        foreach ($allWaterSettings as $waterSetting) {
            $waterSettings[] = new MonthsWaterSetting(
                new WaterSettingId($waterSetting->water_setting_id),
                json_decode($waterSetting->months),
                new WaterNote($waterSetting->water_note),
                new WaterAmount($waterSetting->water_amount),
                new WateringTimes($waterSetting->watering_times),
                new WateringInterval($waterSetting->watering_interval),
                json_decode($waterSetting->alert_times),
            );
        }
        return $waterSettings;

    }

    public function findById(WaterSettingId $waterSettingId): MonthsWaterSetting
    {
        $waterSetting = \App\Models\WaterSetting::where('water_setting_id', $waterSettingId->getId())->first();
        if ($waterSetting === null) {
            throw new NotFoundException('指定した水やり設定IDを見つけることができませんでした');
        }
        return new MonthsWaterSetting(
            new WaterSettingId($waterSetting->water_setting_id),
            json_decode($waterSetting->months),
            new WaterNote($waterSetting->water_note),
            new WaterAmount($waterSetting->water_amount),
            new WateringTimes($waterSetting->watering_times),
            new WateringInterval($waterSetting->watering_interval),
            json_decode($waterSetting->alert_times),
        );
    }

    public function save(WaterSettingCollection $waterSetting, string $checkSeatId): void
    {
        $collectionArray = $waterSetting->toArray();
        foreach ($collectionArray as $waterSetting) {
            \App\Models\WaterSetting::updateOrCreate(['water_setting_id' => $waterSetting->getWaterSettingId()->getId()],
                ['water_setting_id' => $waterSetting->getWaterSettingId()->getId(),
                    'check_seat_id' => $checkSeatId,
                    'months' => json_encode($waterSetting->getMonths()),
                    'water_note' => $waterSetting->getWaterNote()->getvalue(),
                    'water_amount' => $waterSetting->getWaterAmount()->getValue(),
                    'watering_times' => $waterSetting->getWateringTimes()->getValue(),
                    'watering_interval' => $waterSetting->getWateringInterVal()->getValue(),
                    'alert_times' => json_encode($waterSetting->getAlertTimes()),
                ]);
        }
    }

    public function delete(WaterSettingId $waterSettingId): void
    {
        $waterSetting = \App\Models\WaterSetting::where('water_setting_id', $waterSettingId->getId())->first();

        if ($waterSetting === null) {
            throw new NotFoundException('指定した水やり設定IDを見つけることができませんでした');
        }
        $waterSetting->delete();
    }
}