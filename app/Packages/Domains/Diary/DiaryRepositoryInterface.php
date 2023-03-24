<?php

namespace App\Packages\Domains\Diary;

interface DiaryRepositoryInterface
{
    public function find():array;

    public function findById(DiaryId $diaryId):Diary;

    public function save(DiaryCollection $diary,string $plantUnitId):void;

    public function delete(DiaryId $diaryId):void;
}
