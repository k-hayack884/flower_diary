<?php

namespace Packages\Domains\Water;

use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterNote;
use DomainException;
use PHPUnit\Framework\TestCase;
use App\Packages\Domains\Water\TarmWaterSetting;

class TarmWateringSettingTest extends TestCase
{

    public function setUp(): void
    {
        $this->note=new WaterNote('水やりは慎重にする');
        $this->waterAmount=WaterAmount::settingALot();
        $this->wateringTimes=new WateringTimes(1);
        $this->wateringInterval=new WateringInterval(2);

    }

    public function test_期間を設定できる()
    {
        $tarm=[1,3,5];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);
        $this->assertInstanceOf(TarmWaterSetting::class,$setting);
        $this->assertSame($setting->getMonths(),[1,3,5]);
    }
    public function test_設定した月が13個以上あるのでエラーを出す()
    {
        $this->expectDeprecationMessage('月の数が１３個以上あります');
        $this->expectException(DomainException::class);
        $tarm=[1,2,3,4,5,6,7,8,8,9,10,11,12];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);
    }
    public function test_１～１２以外の文字があるのでエラーを出す()
    {
        $this->expectDeprecationMessage('その文字は使用できません');
        $this->expectException(DomainException::class);
        $tarm=[1,4,13];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);
    }
    public function test_期間の編集をする()
    {
        $tarm=[1,3,5];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);
        $updatedSetting=$setting->tarmUpdate([1,2,3]);
        $this->assertInstanceOf(TarmWaterSetting::class,$updatedSetting);
        $this->assertSame($updatedSetting->getMonths(),[1,2,3]);
    }
    public function test_期間のリセットをする()
    {
        $tarm=[1,3,5];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);
        $resetedSetting=$setting->tarmReset();
        $this->assertSame($resetedSetting->getMonths(),[1,2,3,4,5,6,7,8,9,10,11,12]);
    }

    public function test_通知時刻を追加する()
    {
        $tarm=[1,3,5];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);

        $hour1=7;
        $minute1=15;
        $hour2=15;
        $minute2=0;
        $setting->addAlertTime($hour1,$minute1);
        $setting->addAlertTime($hour2,$minute2);

        $this->assertSame($setting->getAlertTimes(),['07:15','15:00']);
    }
    public function test_通知時刻を削除する()
    {
        $tarm=[1,3,5];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);

        $hour1=7;
        $minute1=15;
        $hour2=15;
        $minute2=0;
        $setting->addAlertTime($hour1,$minute1);
        $setting->addAlertTime($hour2,$minute2);
        $setting->resetAlertTime();

        $this->assertSame($setting->getAlertTimes(),[]);
        $this->assertEmpty($setting->getAlertTimes());
    }
    public function test_不正な時間単位なのでエラーを出す()
    {
        $this->expectDeprecationMessage('時間は0～23時の範囲で設定してください');
        $this->expectException(DomainException::class);
        $tarm=[1,3,5];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);

        $hour1=24;
        $minute1=15;
        $setting->addAlertTime($hour1,$minute1);
    }
    public function test_不正な分単位なのでエラーを出す()
    {
        $this->expectDeprecationMessage('分は0～59分の範囲で設定してください');
        $this->expectException(DomainException::class);
        $tarm=[1,3,5];
        $setting=new TarmWaterSetting($tarm,$this->note,$this->waterAmount,$this->wateringTimes,$this->wateringInterval);

        $hour1=2;
        $minute1=60;
        $setting->addAlertTime($hour1,$minute1);
    }
}
