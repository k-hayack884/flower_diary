<?php

namespace Packages\Domains\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerNote;
use DomainException;
use PHPUnit\Framework\TestCase;

class FertilizerNoteTest extends TestCase
{
    public function test_備考欄を生成している()
    {
        $note=new FertilizerNote('あいうえおかきくけこさしすせそたちつてと');
        $this->assertInstanceOf(FertilizerNote::class,$note);
        $this->assertSame('あいうえおかきくけこさしすせそたちつてと',$note->getValue());
    }

    public function test_備考欄の文字数が21字以上なのでエラーを出すこと(){
        $this->expectDeprecationMessage('備考欄に入力できる文字数は20字までです');
        $this->expectException(DomainException::class);
        $note=new FertilizerNote('あいうえおかきくけこさしすせそたちつてとなにぬねの');
    }
    public function test_備考欄を編集する()
    {
        $note=new FertilizerNote('あいうえおかきくけこさしすせそたちつてと');
        $note=$note->update('なにぬねのはひふへほまみむめもやいゆえよ');
        $this->assertInstanceOf(FertilizerNote::class,$note);
        $this->assertSame('なにぬねのはひふへほまみむめもやいゆえよ',$note->getValue());
    }
    public function test_備考欄の内容を空にする()
    {
        $note=new FertilizerNote('あいうえおかきくけこさしすせそたちつてと');
        $note=$note->update('');
        $this->assertInstanceOf(FertilizerNote::class,$note);
        $this->assertSame('',$note->getValue());
    }
    public function test_備考欄を編集するが21字以上なのでエラーを出すこと()
    {
        $this->expectDeprecationMessage('備考欄に入力できる文字数は20字までです');
        $this->expectException(DomainException::class);
        $note=new FertilizerNote('あいうえおかきくけこさしすせそたちつてと');
        $note=$note->update('なにぬねのはひふへほまみむめもやいゆえよらりるれろ');
    }
}
