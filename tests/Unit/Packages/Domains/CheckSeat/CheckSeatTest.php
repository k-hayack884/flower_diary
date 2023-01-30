<?php

namespace Packages\Domains\CheckSeat;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterAmountNote;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingID;
use DomainException;
use PHPUnit\Framework\TestCase;

class CheckSeatTest extends TestCase
{
    protected function setUp(): void
    {
        $this->waterSettingCollection = new WaterSettingCollection([
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
        ]);
        $this->fertilizerSettingCollection = new FertilizerSettingCollection([
            new MonthsFertilizerSetting(
                new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                [5, 7, 9],
                new FertilizerNote('豪快に撒く'),
                new FertilizerAmount(111),
                new fertilizerName('泥'),
            ),
        ]);
    }

    public function test_チェックシートが生成される()
    {
        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            $this->waterSettingCollection,
            $this->fertilizerSettingCollection
        );
        $this->assertInstanceOf(CheckSeat::class, $checkSeat);
    }

    public function test_水やり設定のみのチェックシートが生成される()
    {
        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            $this->waterSettingCollection,
            new FertilizerSettingCollection()
        );
        $this->assertInstanceOf(CheckSeat::class, $checkSeat);
        $this->assertInstanceOf(WaterSettingCollection::class, $checkSeat->getWaterSettingCollection());
        $this->assertCount(0, $checkSeat->getFertilizerSettingCollection());
    }

    public function test_肥料設定のみのチェックシートが生成される()
    {
        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            new WaterSettingCollection(),
            $this->fertilizerSettingCollection
        );
        $this->assertInstanceOf(CheckSeat::class, $checkSeat);
        $this->assertCount(0, $checkSeat->getWaterSettingCollection());
        $this->assertInstanceOf(FertilizerSettingCollection::class, $checkSeat->getFertilizerSettingCollection());
    }

    public function test_水と肥料の両方が空のコレクションなので例外を出す()
    {
        $this->expectExceptionMessage("チェックシートを作成するには水やり設定か肥料設定のどちらかを作成する必要があります");
        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            new WaterSettingCollection(),
            new FertilizerSettingCollection()
        );
    }

    public function test_水やり設定のみの月が重複している()
    {
        $duplicationWaterCollection = new WaterSettingCollection([
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
                [5, 6, 7],
                new WaterNote('男なら豪快に'),
                WaterAmount::settingALot(),
                new WateringTimes(5),
                new WateringInterval(1),
                ['06:00', '12:30']
            ),
        ]);
        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            $duplicationWaterCollection,
            $this->fertilizerSettingCollection
        );
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("水やりの月が重複している設定があります");
        $checkSeat->duplicationCheck();

    }

    public function test_同じ肥料の月が重複している()
    {
        $duplicationFertilizerCollection = new FertilizerSettingCollection([
            new MonthsFertilizerSetting(
                new FertilizerSettingId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('株からある程度離して'),
                new FertilizerAmount(100),
                new fertilizerName('牛糞堆肥'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                [1, 3, 5],
                new FertilizerNote('なんでや！阪神関係ないやろ！'),
                new FertilizerAmount(334),
                new fertilizerName('腐葉土'),
            ),
            new MonthsFertilizerSetting(
                new FertilizerSettingId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                [5, 7, 9],
                new FertilizerNote('豪快に撒く'),
                new FertilizerAmount(111),
                new fertilizerName('腐葉土'),
            ),
        ]);
        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            $this->waterSettingCollection,
            $duplicationFertilizerCollection
        );
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("同じ肥料の月が重複している設定があります");
        $checkSeat->duplicationCheck();

    }
}
