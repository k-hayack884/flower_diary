<?php

namespace Packages\Domains\CheckSeat;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\WaterCheckSeat;
use App\Packages\Domains\CheckSeat\WaterCheckSeatID;
use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterAmountNote;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use App\Packages\Domains\Water\WaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingID;
use PHPUnit\Framework\TestCase;

class WaterCheckSeatTest extends TestCase
{
    protected function setUp(): void
    {
        $this->waterSettingCollection =new WaterSettingCollection( [
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
        ]);

    }

    public function test_コレクションの一部が削除される()
    {

        new WaterCheckSeat(new WaterCheckSeatID('334c1092-7a0d-40b0-af6e-30bff5975e31'),$this->waterSettingCollection);
        $waterSettingId = '334c1092-7a0d-40b0-af6e-30bff5975e31';
        $deleteId=new WaterSettingID($waterSettingId);
        $hige=$this->waterSettingCollection->find($deleteId);
        $this->waterSettingCollection->delete($hige->getWaterSettingId());
        $this->expectException(NotFoundException::class);
        $getWaterSetting = $this->waterSettingCollection->find($deleteId);
    }

    public function test_ノートの内容を変更()
    {
        $resultAmountNote = new WaterAmountNote("静かに水をやる");
        $tarm = new TarmWaterSetting([1, 2, 3]);
        $waterSetting = new WaterSetting(new WaterAmount('a_lot'), new WateringTimes(1), new WateringInterval(2));
        $waterAmountNote = new WaterAmountNote("植木鉢から水があふれないように");
        $waterCheckSeat = new WaterCheckSeat($tarm, $waterSetting, $waterAmountNote, 2, 1);

        $updatedNoteCheckSeat = $waterCheckSeat->updateNote('静かに水をやる');

        $this->assertInstanceOf(WaterCheckSeatID::class, $waterCheckSeat->getId());
        $this->assertSame($updatedNoteCheckSeat->getTarm(), $tarm->getMonths());
        $this->assertInstanceOf(WaterSetting::class, $updatedNoteCheckSeat->getWaterSetting());
        $this->assertSame($updatedNoteCheckSeat->getAmountNote(), $resultAmountNote->getNote());
    }
}
