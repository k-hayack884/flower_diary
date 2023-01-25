<?php

namespace App\Packages\infrastructures\Water;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingID;
use Illuminate\Support\Collection;

class MockWaterRepository
{
    private array $waterSettings = [];

    public function __construct()
    {
        $this->waterSettings[] =
            new TarmWaterSetting(
                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            );
        $this->waterSettings[] =
            new TarmWaterSetting(
                new WaterSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            );
    }

    /**
     * @return array
     */
    public function find(): array
    {
        return $this->waterSettings;
    }

    /**
     * @param WaterSettingID $waterSettingId
     * @return TarmWaterSetting
     * @throws NotFoundException
     */
    public function findById(WaterSettingID $waterSettingId): TarmWaterSetting
    {
        foreach ($this->waterSettings as $waterSetting) {
            if ($waterSetting->getWaterSettingId()->equals($waterSettingId)) {
                return $waterSetting;
            }
        }
        throw new NotFoundException('指定した水やり設定IDは見つかりませんでした');
    }

    /**
     * @param WaterSettingCollection $waterSettingCollection
     * @return void
     */
    public function save(WaterSettingCollection $waterSettingCollection): void
    {
        $collectionArray = $waterSettingCollection->toArray();
        foreach ($collectionArray as $collectionValue) {
            $this->waterSettings[] = $collectionValue;
        }
    }

    /**
     * @param WaterSettingID $waterSettingId
     * @return void
     * @throws NotFoundException
     */
    public function delete(WaterSettingID $waterSettingId): void
    {
        $deleteSetting = $this->findById($waterSettingId);
        $index = array_search($deleteSetting, $this->waterSettings);
        unset($this->waterSettings[$index]);
    }
}
