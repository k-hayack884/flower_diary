<?php

namespace App\Packages\Domains\Diary;

interface DiaryRepositoryInterface
{
    public function find();

    public function findById(DiaryId $diaryId);

    public function save(DiaryCollection $diary);

    public function delete(DiaryId $diaryId);
}
