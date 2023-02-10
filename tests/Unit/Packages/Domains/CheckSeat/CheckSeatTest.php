<?php

namespace Packages\Domains\CheckSeat;

use App\Packages\Domains\CheckSeat\CheckSeat;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterAmountNote;
use App\Packages\Domains\Water\WaterSetting;
use DomainException;
use PHPUnit\Framework\TestCase;

class CheckSeatTest extends TestCase
{
    public function test_チェックシートが生成される()
    {
        $waterSettingIds = ['558c1092-7a0d-40b0-af6e-30bff5975e31', '123c1092-7a0d-40b0-af6e-30bff5975e31', '721c1092-7a0d-40b0-af6e-30bff5975e31'];
        $fertilizerSettingIds = ['114c1092-7a0d-40b0-af6e-30bff5975e31', '893c1092-7a0d-40b0-af6e-30bff5975e31', '334c1092-7a0d-40b0-af6e-30bff5975e31'];

        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            $waterSettingIds,
            $fertilizerSettingIds
        );
        $this->assertInstanceOf(CheckSeat::class, $checkSeat);
    }

    public function test_水やり設定のみのチェックシートが生成される()
    {
        $waterSettingIds = ['558c1092-7a0d-40b0-af6e-30bff5975e31', '123c1092-7a0d-40b0-af6e-30bff5975e31', '721c1092-7a0d-40b0-af6e-30bff5975e31'];
        $fertilizerSettingIds = [];

        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            $waterSettingIds,
            $fertilizerSettingIds
        );
        $this->assertInstanceOf(CheckSeat::class, $checkSeat);
        $this->assertIsArray($checkSeat->getWaterSettingIds());
        $this->assertEmpty($checkSeat->getFertilizerSettingIds());
    }

    public function test_肥料設定のみのチェックシートが生成される()
    {
        $waterSettingIds = [];
        $fertilizerSettingIds = ['114c1092-7a0d-40b0-af6e-30bff5975e31', '893c1092-7a0d-40b0-af6e-30bff5975e31', '334c1092-7a0d-40b0-af6e-30bff5975e31'];

        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            $waterSettingIds,
            $fertilizerSettingIds
        );
        $this->assertInstanceOf(CheckSeat::class, $checkSeat);
        $this->assertEmpty($checkSeat->getWaterSettingIds());
        $this->assertIsArray($checkSeat->getFertilizerSettingIds());
    }

    public function test_水と肥料の両方が空のコレクションなので例外を出す()
    {
        $waterSettingIds = [];
        $fertilizerSettingIds = [];

        $this->expectException(DomainException::class);
        $this->expectExceptionMessage("チェックシートを作成するには水やり設定か肥料設定のどちらかを作成する必要があります");
        $checkSeat = new CheckSeat(
            new CheckSeatId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            $waterSettingIds,
            $fertilizerSettingIds
        );
    }
}
