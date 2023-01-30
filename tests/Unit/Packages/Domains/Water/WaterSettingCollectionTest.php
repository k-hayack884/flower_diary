<?php

namespace Packages\Domains\Water;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;
use DomainException;
use PHPUnit\Framework\TestCase;

class WaterSettingCollectionTest extends TestCase
{
    public function test_オブジェクトが生成されること()
    {
        $waterSettings = [
            new MonthsWaterSetting(
                new WaterSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new MonthsWaterSetting(
                new WaterSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            )
        ];

        $waterSettingCollection = new WaterSettingCollection($waterSettings);

        $this->assertCount(count($waterSettings), $waterSettingCollection);
        foreach ($waterSettingCollection as $index => $waterSetting) {
            $this->assertSame($index, $waterSetting->getWaterSettingId()->getId());
        }
    }

    public function test_空のオブジェクトが生成されること()
    {
        $waterSettings = [];

        $waterSettingCollection = new WaterSettingCollection($waterSettings);
        $this->assertCount(count($waterSettings), $waterSettingCollection);

    }

    public function test_新しい設定を追加すること()
    {
        $waterSettings = [
            new MonthsWaterSetting(
                new WaterSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new MonthsWaterSetting(
                new WaterSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            )
        ];

        $waterSettingCollection = new WaterSettingCollection($waterSettings);


        $addWaterSetting =
            new MonthsWaterSetting(
                new WaterSettingId('114c5142-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('豪快に与える'),
                WaterAmount::settingALot(),
                new WateringTimes(3),
                new WateringInterval(1),
                ['11:30', '21:15']
            );
        $waterSettingCollection->addSetting($addWaterSetting);
        $waterSettings[] = $addWaterSetting;

        $this->assertCount(count($waterSettings), $waterSettingCollection);
        foreach ($waterSettingCollection as $index => $waterSetting) {
            $this->assertSame($index, $waterSetting->getWaterSettingId()->getId());
        }

    }

    public function test_設定を削除すること()
    {
        $waterSettings = [
            new MonthsWaterSetting(
                new WaterSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new MonthsWaterSetting(
                new WaterSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            )
        ];

        $waterSettingCollection = new WaterSettingCollection($waterSettings);

        $deleteWaterSettingId = new WaterSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31');
        $deleteWaterSetting = $waterSettingCollection->findById($deleteWaterSettingId);
        $waterSettingCollection->delete($deleteWaterSetting);
        $this->expectException(NotFoundException::class);
        $getWaterSetting = $waterSettingCollection->findById($deleteWaterSettingId);
    }

    public function test_月が被ったオブジェクトを摘出すること()
    {
        $waterSettings = [
            new MonthsWaterSetting(
                new WaterSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new MonthsWaterSetting(
                new WaterSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [10, 11, 12],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            ),
            new MonthsWaterSetting(
                new WaterSettingId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                [5, 7, 9],
                new WaterNote('男なら豪快に'),
                WaterAmount::settingALot(),
                new WateringTimes(5),
                new WateringInterval(1),
                ['06:00', '12:30']
            ),
        ];
        $waterSettingCollection = new WaterSettingCollection($waterSettings);
        $duplicationCollection=$waterSettingCollection->duplicationDisplay();
        $this->assertSame($waterSettingCollection->getValue(0),$duplicationCollection->getValue(0));
        $this->assertSame($waterSettingCollection->getValue(2),$duplicationCollection->getValue(1));
    }
    public function test_月が被らなかった場合は空のオブジェクトを返していること()
    {
        $waterSettings = [
            new MonthsWaterSetting(
                new WaterSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new MonthsWaterSetting(
                new WaterSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [10, 11, 12],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            ),
            new MonthsWaterSetting(
                new WaterSettingId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                [7, 8, 9],
                new WaterNote('男なら豪快に'),
                WaterAmount::settingALot(),
                new WateringTimes(5),
                new WateringInterval(1),
                ['06:00', '12:30']
            ),
        ];
        $waterSettingCollection = new WaterSettingCollection($waterSettings);
        $duplicationCollection=$waterSettingCollection->duplicationDisplay();
        $this->assertCount(0, $duplicationCollection);
    }
}
