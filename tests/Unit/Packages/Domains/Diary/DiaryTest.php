<?php

namespace Packages\Domains\Diary;

use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class DiaryTest extends TestCase
{

    public function test_日記を作成する()
    {
        $diaryId=new DiaryId('558c1092-7a0d-40b0-af6e-30bff5975e31');
        $diaryContent=new DiaryContent('今日も元気に育ってます');
        $diary=new Diary($diaryId,$diaryContent);

        $this->assertInstanceOf(Diary::class,$diary);
        $this->assertInstanceOf(DiaryId::class,$diary->getDiaryId());
        $this->assertInstanceOf(DiaryContent::class,$diary->getDiaryContent());
        $this->assertInstanceOf(Carbon::class,$diary->getCreateDate());
    }
    public function test_日記を編集する()
    {
        $diaryId=new DiaryId('558c1092-7a0d-40b0-af6e-30bff5975e31');
        $diaryContent=new DiaryContent('今日も元気に育ってます');
        $diary=new Diary($diaryId,$diaryContent);

        $diary->updateContent('書き換えました');
        $this->assertInstanceOf(Diary::class,$diary);
        $this->assertSame('書き換えました',$diary->getDiaryContent()->getValue());
    }
}
