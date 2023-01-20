<?php

namespace App\Packages\infrastructures\Water;

use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingID;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;

class MockWaterRepository implements WaterSettingRepositoryInterface
{
    private WaterSettingCollection $waterSettings;

    public function __construct()
    {
        $this->waterSettings = new WaterSettingCollection();
        $this->waterSettings->add(
            new TarmWaterSetting(
                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                new WaterAmount('a_lot'),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            )
        );
        $this->waterSettings->add(
            new TarmWaterSetting(
                new WaterSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                new WaterAmount('sparingly'),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            )
        );
    }

    public function find(): WaterSettingCollection
    {
        return $this->waterSettings;
    }

    public function findById(WaterSettingID $waterSettingId): TarmWaterSetting
    {

        return $this->waterSettings->find($waterSettingId);
    }

    public function save(TarmWaterSetting $waterSetting): void
    {
        $this->waterSettings->add($waterSetting);
    }

    public function delete(WaterSettingId $waterSettingId): void
    {
        $this->waterSettings->delete($waterSettingId->getId());
    }
}
