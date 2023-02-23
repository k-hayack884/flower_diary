<?php

namespace App\Packages\Domains\Diary;

interface DiaryRepositoryInterface
{
    public function find():array;

    public function findById(DiaryId $diaryId):Diary;

    public function save(DiaryCollection $diary):void;

    public function delete(DiaryId $diaryId):void;
}
