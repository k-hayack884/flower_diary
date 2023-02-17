<?php

namespace Packages\Domains\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class DiaryCollectionTest extends TestCase
{
    public function test_オブジェクトが生成されること()
    {
        $diaries = [
            new Diary(
                new DiaryId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('とてもいい'),
            ),
            new Diary(
                new DiaryId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('ほげえ'),
            )
        ];

        $diaryCollection = new DiaryCollection($diaries);

        $this->assertCount(count($diaries), $diaryCollection);
        foreach ($diaryCollection as $index => $diaries) {
            $this->assertSame($index, $diaries->getDiaryId()->getId());
        }
    }

    public function test_空のオブジェクトが生成されること()
    {
        $diaries = [];

        $diaryCollection = new DiaryCollection($diaries);
        $this->assertCount(count($diaries), $diaryCollection);

    }

    public function test_新しい設定を追加すること()
    {
        $diaries = [
            new Diary(
                new DiaryId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('とてもいい'),
            ),
            new Diary(
                new DiaryId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('ほげえ'),
            )
        ];

        $diaryCollection = new DiaryCollection($diaries);

        $addDiary =
            new Diary(
                new DiaryId('514c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('やったぜ')
            );
        $diaryCollection->addDiary($addDiary);
        $diaries[] = $addDiary;

        $this->assertCount(count($diaries), $diaryCollection);
        foreach ($diaryCollection as $index => $diary) {
            $this->assertSame($index, $diary->getDiaryId()->getId());
        }

    }

    public function test_設定を削除すること()
    {
        $diaries = [
            new Diary(
                new DiaryId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('とてもいい'),
            ),
            new Diary(
                new DiaryId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('ほげえ'),
            )
        ];

        $diaryCollection = new DiaryCollection($diaries);
        $diaryId = new DiaryId('333c1092-7a0d-40b0-af6e-30bff5975e31');
        $deleteDiary = $diaryCollection->findById($diaryId);

        $diaryCollection->delete($deleteDiary);
        $this->expectException(NotFoundException::class);
        $getDiary = $diaryCollection->findById($diaryId);
    }

    public function test_オブジェクトの内容が日付順で並び変えられること()
    {
        $before1DayDate = Carbon::yesterday();
        $nowDate = Carbon::now();
        $after1dayDate = Carbon::tomorrow();
        $after1HourDate = Carbon::now()->addHours(1);

        $diaries = [
            new Diary(
                new DiaryId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('昨日'),
                [],
                $before1DayDate
            ),
            new Diary(
                new DiaryId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('明日'),
                [],
                $after1dayDate
            ),
            new Diary(
                new DiaryId('888c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('今日'),
                [],
                $nowDate
            ),
            new Diary(
                new DiaryId('999c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('今日＋1時間'),
                [],
                $after1HourDate
            )
        ];
        $diaryCollection = new DiaryCollection($diaries);
        $sortedCollection = $diaryCollection->sortDate();
        $sortedArray = $sortedCollection->toArray();
        foreach ($sortedArray as $value) {
            $results[] = $value->getDiaryContent()->getValue();
        }
        $this->assertCount(count($diaries), $sortedCollection);
        $this->assertSame('明日', $results[0]);
        $this->assertSame('今日＋1時間', $results[1]);
        $this->assertSame('今日', $results[2]);
        $this->assertSame('昨日', $results[3]);
    }
}
