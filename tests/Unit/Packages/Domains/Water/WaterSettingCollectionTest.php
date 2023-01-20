<?php

namespace Packages\Domains\Water;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingID;
use DomainException;
use PHPUnit\Framework\TestCase;

class WaterSettingCollectionTest extends TestCase
{
    public function test_オブジェクトが生成されること()
    {
        $waterSettings = [
            new TarmWaterSetting(
                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new TarmWaterSetting(
                new WaterSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
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
            new TarmWaterSetting(
                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new TarmWaterSetting(
                new WaterSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            )
        ];

        $waterSettingCollection = new WaterSettingCollection($waterSettings);

        $addWaterSetting = new TarmWaterSetting(
            new WaterSettingID('114c5142-7a0d-40b0-af6e-30bff5975e31'),
            [1, 3, 5],
            new WaterNote('豪快に与える'),
            WaterAmount::settingALot(),
            new WateringTimes(3),
            new WateringInterval(1),
            ['11:30', '21:15']
        );
        $waterSettingCollection->add($addWaterSetting);
        $waterSettings[] = $addWaterSetting;

        $this->assertCount(count($waterSettings), $waterSettingCollection);
        foreach ($waterSettingCollection as $index => $waterSetting) {
            $this->assertSame($index, $waterSetting->getWaterSettingId()->getId());
        }

    }

    public function test_WaterSettingIDが重複しているので、生成できずエラーを出すこと()
    {
        $waterSettings = [
            new TarmWaterSetting(
                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new TarmWaterSetting(
                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            )
        ];
        $this->expectException(DomainException::class);
        $waterSettingCollection = new WaterSettingCollection($waterSettings);

        $this->assertCount(count($waterSettings), $waterSettingCollection);
        foreach ($waterSettingCollection as $index => $waterSetting) {
            $this->assertSame($waterSettings[$index]->getWaterSettingId()->getId(), $waterSetting->getWaterSettingId()->getId());
        }
    }
    public function test_設定を削除すること()
    {
        $waterSettings = [
            new TarmWaterSetting(
                new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('水やりは慎重に'),
                WaterAmount::settingALot(),
                new WateringTimes(1),
                new WateringInterval(2),
                ['09:00', '23:30']
            ),
            new TarmWaterSetting(
                new WaterSettingID('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new WaterNote('なんでや！阪神関係ないやろ！'),
                WaterAmount::settingSparingly(),
                new WateringTimes(3),
                new WateringInterval(34),
                ['12:59', '3:34']
            )
        ];

        $waterSettingCollection = new WaterSettingCollection($waterSettings);

        $waterSettingCollection->delete($waterSettings[0]);
        $this->expectException(NotFoundException::class);
        $inquireWaterSettingId =new WaterSettingID('983c1092-7a0d-40b0-af6e-30bff5975e31');
        $getWaterSetting=$waterSettingCollection->find($inquireWaterSettingId);
    }

}
