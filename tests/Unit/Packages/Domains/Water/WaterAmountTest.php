<?php

declare(strict_types=1);

namespace tests\Unit\Packages\Domains\Water;

use App\Packages\Domains\Water\WaterAmount;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class WaterAmountTest extends TestCase
{
    public function test_水やりがたっぷりに設定できること(){
        $waterRecord=WaterAmount::settingALot();
        $this->assertTrue($waterRecord->isALot());
        $this->assertFalse($waterRecord->isModerateAmount());
        $this->assertFalse($waterRecord->isSparingly());
    }
    public function test_水やりが適量に設定できること(){
        $waterRecord=WaterAmount::settingModerateAmount();
        $this->assertFalse($waterRecord->isALot());
        $this->assertTrue($waterRecord->isModerateAmount());
        $this->assertFalse($waterRecord->isSparingly());
    }
    public function test_水やりがひかえめに設定できること(){
        $waterRecord=WaterAmount::settingSparingly();
        $this->assertFalse($waterRecord->isALot());
        $this->assertFalse($waterRecord->isModerateAmount());
        $this->assertTure($waterRecord->isSparingly());
    }
    public function test_更新日時を取得できること(){
        $waterRecord=new WaterAmount('a_lot');
        $this->assertInstanceOf(Carbon::class,$waterRecord->getCreateAt());
    }
}
