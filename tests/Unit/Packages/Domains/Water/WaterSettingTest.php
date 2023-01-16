<?php

namespace Packages\Domains\Water;

use App\Packages\Domains\Water\Tarm;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterAmountNote;
use App\Packages\Domains\Water\WaterSetting;
use App\Packages\Domains\Water\WaterSettingID;
use PHPUnit\Framework\TestCase;

class WaterSettingTest extends TestCase
{
    public function test_インスタンスが正しく生成される()
    {
        $tarm = new Tarm(1, 2, 3);
        $waterAmount = WaterAmount::settingALot();
        $waterAmountNote = new WaterAmountNote("植木鉢から水があふれないように");

        $waterSetting=new WaterSetting($tarm,$waterAmount,$waterAmountNote,2,1);

        $this->assertInstanceOf(WaterSettingID::class,$waterSetting->getId());
        $this->assertSame($waterSetting->getTarm(),$tarm->getMonths());
        $this->assertSame($waterSetting->getAmount(),$waterAmount->getValue());
        $this->assertSame($waterSetting->getAmountNote(),$waterAmountNote->getNote());
        $this->assertSame($waterSetting->getWateringTimes(),2);
        $this->assertSame($waterSetting->getWateringInterval(),1);
    }

    public function test_生成物の内容をリセットする()
    {
        $tarm = new Tarm([1, 2, 3]);
        $waterAmount = WaterAmount::settingALot();
        $waterAmountNote = new WaterAmountNote("植木鉢から水があふれないように");

        $resultTarm=new Tarm([1,2,3,4,5,6,7,8,9,10,11,12]);
        $resultWaterAmount=WaterAmount::settingModerateAmount();
        $resultWaterAmountNote=new WaterAmountNote('');

        $waterSetting=new WaterSetting($tarm,$waterAmount,$waterAmountNote,2,1);
        $resetedWaterSetting=$waterSetting->reset();

        $this->assertInstanceOf(WaterSettingID::class,$resetedWaterSetting->getId());
        $this->assertSame($resetedWaterSetting->getTarm(), $resultTarm->getMonths());
        $this->assertSame($resetedWaterSetting->getAmount(),$resultWaterAmount->getValue());
        $this->assertSame($resetedWaterSetting->getAmountNote(),$resultWaterAmountNote->getNote());
        $this->assertSame($resetedWaterSetting->getWateringTimes(),1);
        $this->assertSame($resetedWaterSetting->getWateringInterval(),1);
}

}
