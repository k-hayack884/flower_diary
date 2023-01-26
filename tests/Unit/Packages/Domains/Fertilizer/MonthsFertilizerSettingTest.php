<?php

namespace Packages\Domains\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerSettingID;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use DomainException;
use PHPUnit\Framework\TestCase;

class MonthsFertilizerSettingTest extends TestCase
{
    public function setUp(): void
    {
        $this->fertilizerSettingId=new FertilizerSettingID();
        $this->note=new FertilizerNote('株からある程度離して');
        $this->fertilizerAmount=new FertilizerAmount(100);
        $this->fertilizerName=new fertilizerName('牛糞堆肥');
    }

    public function test_期間を設定できる()
    {
        $tarm=[1,3,5];

        $setting=new MonthsFertilizerSetting($this->fertilizerSettingId,$tarm,$this->note,$this->fertilizerAmount,$this->fertilizerName);
        $this->assertInstanceOf(MonthsFertilizerSetting::class,$setting);
        $this->assertSame($setting->getMonths(),[1,3,5]);
    }
    public function test_設定した月が13個以上あるのでエラーを出す()
    {
        $this->expectDeprecationMessage('月の数が１３個以上あります');
        $this->expectException(DomainException::class);
        $tarm=[1,2,3,4,5,6,7,8,8,9,10,11,12];
        $setting=new MonthsFertilizerSetting($this->fertilizerSettingId,$tarm,$this->note,$this->fertilizerAmount,$this->fertilizerName);
    }
    public function test_１～１２以外の文字があるのでエラーを出す()
    {
        $this->expectDeprecationMessage('その文字は使用できません');
        $this->expectException(DomainException::class);
        $tarm=[1,4,13];
        $setting=new MonthsFertilizerSetting($this->fertilizerSettingId,$tarm,$this->note,$this->fertilizerAmount,$this->fertilizerName);
    }
    public function test_期間の編集をする()
    {
        $tarm=[1,3,5];
        $setting=new MonthsFertilizerSetting($this->fertilizerSettingId,$tarm,$this->note,$this->fertilizerAmount,$this->fertilizerName);
        $updatedSetting=$setting->tarmUpdate([1,2,3]);
        $this->assertInstanceOf(MonthsFertilizerSetting::class,$updatedSetting);
        $this->assertSame($updatedSetting->getMonths(),[1,2,3]);
    }
    public function test_期間のリセットをする()
    {
        $tarm=[1,3,5];
        $setting=new MonthsFertilizerSetting($this->fertilizerSettingId,$tarm,$this->note,$this->fertilizerAmount,$this->fertilizerName);
        $resetedSetting=$setting->tarmReset();
        $this->assertSame($resetedSetting->getMonths(),[1,2,3,4,5,6,7,8,9,10,11,12]);
    }
}
