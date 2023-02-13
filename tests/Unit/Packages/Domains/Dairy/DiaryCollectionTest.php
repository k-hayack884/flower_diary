<?php

namespace Packages\Domains\Dairy;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Dairy\Diary;
use App\Packages\Domains\Dairy\DiaryCollection;
use App\Packages\Domains\Dairy\DiaryContent;
use App\Packages\Domains\Dairy\DiaryId;
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
}
