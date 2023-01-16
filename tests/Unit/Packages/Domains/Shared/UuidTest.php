<?php

namespace Packages\Domains\Shared;

use App\Packages\Domains\Shared\Uuid;
use DomainException;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{
    public function test_引数なしで生成した場合、書式が正しいこと()
    {
        $uuid=new Uuid();
        $uuidPattern='/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/';
        $this->assertMatchesRegularExpression($uuidPattern,$uuid->getValue());
    }

    public function test_引数から生成した場合、生成物の値が引数と同じになっていること()
    {
     $uuidValue='983c1092-7a0d-40b0-af6e-30bff5975e31';
     $uuid=new Uuid($uuidValue);
     $this->assertSame($uuidValue,$uuid->getValue());
    }

    public function test_引数の桁数が少ないので例外が発生すること()
    {
     $this->expectException(DomainException::class);
     $this->expectExceptionMessage('uuid is invalid. value:');
     $uuidValue= '983c1092-7a0d-40b0-af6e-30bff5975e3';
     new Uuid($uuidValue);
    }

    public function test_引数の桁数が多いので例外が発生すること()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('uuid is invalid. value:');
        $uuidValue= '983c1092-7a0d-40b0-af6e-30bff5975e313';
        new Uuid($uuidValue);
    }
    public function test_引数の内容が不正なので例外が発生すること()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('uuid is invalid. value:');
        $uuidValue= 'あいうえお-かきくけ-こさしす-せそたち-つてとなにぬねの';
        new Uuid($uuidValue);
    }

    public function test_オブジェクトの値が一緒と判定されること()
    {
        $uuidValue= '983c1092-7a0d-40b0-af6e-30bff5975e33';
        $uuid1=new Uuid($uuidValue);
        $uuid2=new Uuid($uuidValue);
        $this->assertTrue($uuid1->equals($uuid2));
    }
    public function test_オブジェクトの値が異なると判定されること()
    {
        $uuidValue1= '983c1092-7a0d-40b0-af6e-30bff5975e33';
        $uuidValue2= '983c1092-7a0d-40b0-af6e-30bff5975e34';

        $uuid1=new Uuid($uuidValue1);
        $uuid2=new Uuid($uuidValue2);
        $this->assertFalse($uuid1->equals($uuid2));
    }
}
