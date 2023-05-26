<?php

namespace App\Packages\infrastructures\Water;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;

class MockWaterRepository implements WaterSettingRepositoryInterface
{
    /**
     * @var MonthsWaterSetting[]
     */
    private array $waterSettings = [];

    public function __construct()
    {
        $this->waterSettings[] =
            new MonthsWaterSetting(
                new WaterSettingId('999c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                new WaterAmount('a_lot'),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            );
        $this->waterSettings[] =
            new MonthsWaterSetting(
                new WaterSettingId('998c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                new WaterAmount('sparingly'),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            );
        $this->waterSettings[] =
            new MonthsWaterSetting(
                new WaterSettingId('997c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 11,12],
                new WaterNote('どばどば出す'),
                new WaterAmount('sparingly'),
                new WateringTimes(1),
                new WateringInterval(1),
                ['12:00']
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
     * @param WaterSettingId $waterSettingId
     * @return MonthsWaterSetting
     * @throws NotFoundException
     */
    public function findById(WaterSettingId $waterSettingId): MonthsWaterSetting
    {
        foreach ($this->waterSettings as $waterSetting) {
            if ($waterSetting->getWaterSettingId()->equals($waterSettingId)) {
                return $waterSetting;
            }
        }
        throw new NotFoundException('指定した水やり設定IDは見つかりませんでした (id:' . $waterSettingId->getId() . ')');
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
     * @param WaterSettingId $waterSettingId
     * @return void
     * @throws NotFoundException
     */
    public function delete(WaterSettingId $waterSettingId): void
    {
        $deleteSetting = $this->findById($waterSettingId);
        $index = array_search($deleteSetting, $this->waterSettings);
        unset($this->waterSettings[$index]);

    }
}
