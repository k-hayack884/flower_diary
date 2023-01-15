<?php

namespace Packages\Domains\Water;

use App\Packages\Domains\Water\Tarm;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterAmountNote;
use App\Packages\Domains\Water\WaterSetting;
use PHPUnit\Framework\TestCase;

class WaterSettingTest extends TestCase
{
    public function test_インスタンスが正しく生成される()
    {
        $tarm = new Tarm(1, 2, 3);
        $waterAmount = WaterAmount::settingALot();
        $waterAmountNote = new WaterAmountNote("植木鉢から水があふれないように");

        $waterSetting=new WaterSetting($tarm,$waterAmount,$waterAmountNote);

        $this->assertSame($waterSetting->getTerm(),$tarm->getMonths());
        $this->assertSame($waterSetting->getAmount(),$waterAmount->getValue());
        $this->assertSame($waterSetting->getAmountNote(),$waterAmountNote->getNote());
    }
}
