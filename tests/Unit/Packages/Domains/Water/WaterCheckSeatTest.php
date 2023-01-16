<?php

namespace Packages\Domains\Water;

use App\Packages\Domains\Water\Tarm;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterAmountNote;
use App\Packages\Domains\Water\WaterCheckSeat;
use App\Packages\Domains\Water\WaterCheckSeatID;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterSetting;
use PHPUnit\Framework\TestCase;

class WaterCheckSeatTest extends TestCase
{
    public function test_インスタンスが正しく生成される()
    {
        $tarm = new Tarm([1, 2, 3]);
        $waterSetting = new WaterSetting(new WaterAmount('a_lot'),new WateringTimes(1),new WateringInterval(2));
        $waterAmountNote = new WaterAmountNote("植木鉢から水があふれないように");

        $waterCheckSeat=new WaterCheckSeat($tarm,$waterSetting,$waterAmountNote,2,1);

        $this->assertInstanceOf(WaterCheckSeatID::class,$waterCheckSeat->getId());
        $this->assertSame($waterCheckSeat->getTarm(),$tarm->getMonths());
        $this->assertInstanceOf(WaterSetting::class,$waterCheckSeat->getWaterSetting());
        $this->assertSame($waterCheckSeat->getAmountNote(),$waterAmountNote->getNote());
    }
    public function test_ノートの内容を変更()
    {
        $tarm = new Tarm([1, 2, 3]);
        $waterSetting = new WaterSetting(new WaterAmount('a_lot'),new WateringTimes(1),new WateringInterval(2));
        $waterAmountNote = new WaterAmountNote("植木鉢から水があふれないように");

        $waterCheckSeat=new WaterCheckSeat($tarm,$waterSetting,$waterAmountNote,2,1);

        $this->assertInstanceOf(WaterCheckSeatID::class,$waterCheckSeat->getId());
        $this->assertSame($waterCheckSeat->getTarm(),$tarm->getMonths());
        $this->assertInstanceOf(WaterSetting::class,$waterCheckSeat->getWaterSetting());
        $this->assertSame($waterCheckSeat->getAmountNote(),$waterAmountNote->getNote());
    }

}
