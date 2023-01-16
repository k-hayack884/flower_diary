<?php

namespace Packages\Domains\Water;

use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\wateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterSetting;
use PHPUnit\Framework\TestCase;

class WaterSettingTest extends TestCase
{
    public function test_インスタンスが正しく生成される()
    {
        $waterAmount = WaterAmount::settingALot();
        $wateringTimes =new WateringTimes(2);
        $wateringInterval=new wateringInterval(1);

        $waterSetting=new WaterSetting($waterAmount,$wateringTimes,$wateringInterval);

        $this->assertInstanceOf(WaterSetting::class, $waterSetting);
        $this->assertSame($waterSetting->getAmount(),$waterAmount->getValue());
        $this->assertSame($waterSetting->getWateringTimes(),2);
        $this->assertSame($waterSetting->getWateringInterval(),1);
    }
    public function test_水やりの設定を更新する()
    {
        $waterAmount = WaterAmount::settingModerateAmount();
        $wateringTimes =new WateringTimes(2);
        $wateringInterval=new wateringInterval(1);

        $resultWaterAmount=WaterAmount::settingAlot();
        $resultWateringTimes=new WateringTimes(1);
        $resultWateringInterval=new wateringInterval(3);

        $updatedWaterAmount='a_lot';
        $updatedWateringTimes=1;
        $updatedWateringInterval=3;

        $waterSetting=new WaterSetting($waterAmount,$wateringTimes,$wateringInterval);
        $updatedWaterSetting=$waterSetting->update($updatedWaterAmount,$updatedWateringTimes,$updatedWateringInterval);

        $this->assertSame($updatedWaterSetting->getAmount(),$resultWaterAmount->getValue());
        $this->assertSame($updatedWaterSetting->getWateringTimes(),$resultWateringTimes->getValue());
        $this->assertSame($updatedWaterSetting->getWateringInterval(),$resultWateringInterval->getValue());
    }
        public function test_水やりの設定をリセットする()
    {
        $waterAmount = WaterAmount::settingALot();
        $wateringTimes =new WateringTimes(2);
        $wateringInterval=new wateringInterval(1);

        $resultWaterAmount=WaterAmount::settingModerateAmount();
        $resultWateringTimes=new WateringTimes(WateringTimes::RESET);
        $resultWateringInterval=new wateringInterval(wateringInterval::RESET);

        $waterSetting=new WaterSetting($waterAmount,$wateringTimes,$wateringInterval);
        $resetedWaterSetting=$waterSetting->reset();

        $this->assertSame($resetedWaterSetting->getAmount(),$resultWaterAmount->getValue());
        $this->assertSame($resetedWaterSetting->getWateringTimes(),$resultWateringTimes->getValue());
        $this->assertSame($resetedWaterSetting->getWateringInterval(),$resultWateringInterval->getValue());
    }

}
