<?php

declare(strict_types=1);

namespace tests\Unit\Packages\Domains\Water;

use App\Packages\Domains\Water\WaterAmount;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class WaterAmountTest extends TestCase
{
    public function test_水やりがたっぷりに設定できること(){
        $waterAmount=WaterAmount::settingALot();
        $this->assertTrue($waterAmount->isALot());
        $this->assertFalse($waterAmount->isModerateAmount());
        $this->assertFalse($waterAmount->isSparingly());
    }
    public function test_水やりが適量に設定できること(){
        $waterAmount=WaterAmount::settingModerateAmount();
        $this->assertFalse($waterAmount->isALot());
        $this->assertTrue($waterAmount->isModerateAmount());
        $this->assertFalse($waterAmount->isSparingly());
    }
    public function test_水やりがひかえめに設定できること(){
        $waterAmount=WaterAmount::settingSparingly();
        $this->assertFalse($waterAmount->isALot());
        $this->assertFalse($waterAmount->isModerateAmount());
        $this->assertTrue($waterAmount->isSparingly());
    }
}
