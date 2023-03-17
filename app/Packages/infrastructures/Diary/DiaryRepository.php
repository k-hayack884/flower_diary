<?php

namespace App\Packages\infrastructures\Diary;

use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;

class DiaryRepository implements DiaryRepositoryInterface
{

    public function find(): array
    {
        // TODO: Implement find() method.
        return \App\Models\Diary::all();
    }

    public function findById(DiaryId $diaryId): Diary
    {
        return \App\Models\Diary::all();
    }

    public function save(DiaryCollection $diary): void
    {
        $collectionArray = $diary->toArray();


        foreach ($collectionArray as $diary) {
            \App\Models\Diary::updateOrCreate(['diary_id' => $diary->getDiaryId()->getId()],
                [
                    'diary_id' => $diary->getDiaryId()->getId(),
                    'diary_content' => $diary->getDiaryContent()->getvalue(),
                    'comments' => json_encode($diary->getComments()),
                    'create_date' => $diary->getCreateDate()->format('Y/m/d')]);
        }
    }

    public function delete(DiaryId $diaryId): void
    {
        // TODO: Implement delete() method.
    }
}
