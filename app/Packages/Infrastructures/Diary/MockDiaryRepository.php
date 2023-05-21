<?php

namespace App\Packages\infrastructures\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use Carbon\Carbon;

class MockDiaryRepository implements DiaryRepositoryInterface
{
    /**
     * @var Diary[]
     */
    private array $diaries=[];
    public function __construct()
    {
        $commentIdA=['666c1092-7a0d-40b0-af6e-30bff5975e31','665c1092-7a0d-40b0-af6e-30bff5975e31'];
        $commentIdB=['667c1092-7a0d-40b0-af6e-30bff5975e31'];
        $commentIdC=[];
        $commentIdD=[];

        $diaryA=
            new Diary(
                new DiaryId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('とてもいい'),
                $commentIdA,
              new Carbon('2023-01-28 14:21:00')
            );
        $diaryB=
            new Diary(
                new DiaryId('337c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('ほげえ'),
                $commentIdB,
                new Carbon('2023-02-02 18:22:35')

            );
        $diaryC=
            new Diary(
                new DiaryId('335c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('あかん'),
                $commentIdC,
                new Carbon('2023-01-14 12:24:00')
            );
        $diaryD=
            new Diary(
                new DiaryId('336c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('アイイイイイイイ！'),
                $commentIdD,
                new Carbon('2023-01-28 03:34:00')

            );
        $this->diaries[]=$diaryA;
        $this->diaries[]=$diaryB;
        $this->diaries[]=$diaryC;
        $this->diaries[]=$diaryD;
    }

    /**
     * @return Diary[]
     */
    public function find(): array
    {
        return $this->diaries;
    }

    /**
     * @param DiaryId $diaryId
     * @return Diary
     * @throws NotFoundException
     */
    public function findById(DiaryId $diaryId):Diary
    {

        foreach ($this->diaries as $diary) {
            if ($diary->getDiaryId()->equals($diaryId)) {
                return $diary;
            }
        }
        throw new NotFoundException('指定した日記IDは見つかりませんでした (id:' . $diaryId->getId() . ')');
    }

    /**
     * @param DiaryCollection $diary
     * @return void
     */
    public function save(DiaryCollection $diary): void
    {
        $collectionArray = $diary->toArray();
        foreach ($collectionArray as $collectionValue) {
            $this->diaries[] = $collectionValue;
        }
    }

    /**
     * @param DiaryId $diaryId
     * @return void
     * @throws NotFoundException
     */
    public function delete(DiaryId $diaryId): void
    {
        $deleteSetting = $this->findById($diaryId);
        $index = array_search($deleteSetting, $this->diaries);
        unset($this->diaries[$index]);
    }
}
