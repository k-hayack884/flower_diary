<?php

namespace Packages\Domains\Water;

use DomainException;
use PHPUnit\Framework\TestCase;
use App\Packages\Domains\Water\Tarm;
class TarmTest extends TestCase
{
    public function test_期間を設定できる()
    {
        $tarm=new Tarm(1,3,5);
        $this->assertInstanceOf(Tarm::class,$tarm,);
        $this->assertSame($tarm->getMonths(),[1,3,5]);
    }
    public function test_設定した月が13個以上あるのでエラーを出す()
    {
        $this->expectDeprecationMessage('月の数が１３個以上あります');
        $this->expectException(DomainException::class);
        $tarm=new Tarm(1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1);
    }
    public function test_１～１２以外の文字があるのでエラーを出す()
    {
        $this->expectDeprecationMessage('その文字は使用できません');
        $this->expectException(DomainException::class);
        $tarm=new Tarm(1,4,13);
    }
}
