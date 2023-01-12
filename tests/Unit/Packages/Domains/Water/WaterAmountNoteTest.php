<?php
declare(strict_types=1);

namespace tests\Unit\Packages\Domains\Water;

use App\Packages\Domains\Water\WaterAmountNote;
use DomainException;
use PHPUnit\Framework\TestCase;

class WaterAmountNoteTest extends TestCase
{
    public function test_備考欄を生成している()
    {
        $note=new WaterAmountNote('あいうえおかきくけこさしすせそたちつてと');
        $this->assertInstanceOf(WaterAmountNote::class,$note);
        $this->assertSame('あいうえおかきくけこさしすせそたちつてと',$note->getNote());
    }
//    public function test_備考欄にNullを入れるとエラーを出すこと(){
//        $this->expectDeprecationMessage('備考欄に文字を入力してください');
//        $this->expectException(DomainException::class);
//        $note=new WaterAmountNote();
//    }
    public function test_備考欄の文字数が21字以上なのでエラーを出すこと(){
        $this->expectDeprecationMessage('備考欄に入力できる文字数は20字までです');
        $this->expectException(DomainException::class);
        $note=new WaterAmountNote('あいうえおかきくけこさしすせそたちつてとなにぬねの');
    }
    public function test_備考欄を編集する()
    {
        $note=new WaterAmountNote('あいうえおかきくけこさしすせそたちつてと');
        $note=$note->update('なにぬねのはひふへほまみむめもやいゆえよ');
        $this->assertInstanceOf(WaterAmountNote::class,$note);
        $this->assertSame('なにぬねのはひふへほまみむめもやいゆえよ',$note->getNote());
    }
    public function test_備考欄を編集するが21字以上なのでエラーを出すこと()
    {
        $this->expectDeprecationMessage('備考欄に入力できる文字数は20字までです');
        $this->expectException(DomainException::class);
        $note=new WaterAmountNote('あいうえおかきくけこさしすせそたちつてと');
        $note=$note->update('なにぬねのはひふへほまみむめもやいゆえよらりるれろ');
    }
    public function test_備考欄の内容を削除する()
    {
        $note=new WaterAmountNote('あいうえおかきくけこさしすせそたちつてと');
        $note=$note->reset();
        $this->assertInstanceOf(WaterAmountNote::class,$note);
        $this->assertSame('',$note->getNote());
    }
}
