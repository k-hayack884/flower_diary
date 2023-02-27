<?php

namespace App\Packages\infrastructures\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;

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

        $diaryA=
            new Diary(
                new DiaryId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('とてもいい'),
                $commentIdA
            );
        $diaryB=
            new Diary(
                new DiaryId('337c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('ほげえ'),
                $commentIdB
            );
        $this->diaries[]=$diaryA;
        $this->diaries[]=$diaryB;
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
