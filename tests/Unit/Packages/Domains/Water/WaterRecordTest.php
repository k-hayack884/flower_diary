<?php


namespace tests\Unit\Packages\Domains\Water;

use App\Packages\Domains\Water\WaterRecord;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class WaterRecordTest extends TestCase
{
    public function test_水やりがたっぷりに設定できること(){
        $waterRecord=WaterRecord::settingALot();
        $this->assertTrue($waterRecord->isALot());
        $this->assertFalse($waterRecord->isModerateAmount());
        $this->assertFalse($waterRecord->isSparingly());


    }
    public function test_水やりが適量に設定できること(){
        $waterRecord=WaterRecord::settingModerateAmount();
        $this->assertFalse($waterRecord->isALot());
        $this->assertTrue($waterRecord->isModerateAmount());
        $this->assertFalse($waterRecord->isSparingly());
    }
    public function test_水やりがひかえめに設定できること(){
        $waterRecord=WaterRecord::settingSparingly();
        $this->assertFalse($waterRecord->isALot());
        $this->assertFalse($waterRecord->isModerateAmount());
        $this->assertTure($waterRecord->isSparingly());
    }
    public function test_更新日時を取得できること(){
        $waterRecord=new WaterRecord('a_lot');
        $this->assertInstanceOf(Carbon::class,$waterRecord->getCreateAt());
    }
}
