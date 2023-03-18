<?php

namespace App\Packages\infrastructures\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use Carbon\Carbon;

class DiaryRepository implements DiaryRepositoryInterface
{

    public function find(): array
    {
        // TODO: Implement find() method.
        return \App\Models\Diary::all();
    }

    public function findById(DiaryId $diaryId): Diary
    {
        $diary = \App\Models\Diary::where('diary_id', $diaryId->getId())->first();
        if ($diary === null) {
            throw new NotFoundException('指定した日記IDを見つけることができませんでした');
        }
        return new Diary(
            new DiaryId($diary->diary_id),
            new DiaryContent($diary->diary_content),
            json_decode($diary->comments),
            new Carbon($diary->create_date),
        );
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
        $diary = \App\Models\Diary::where('diary_id', $diaryId->getId())->first();

        if ($diary === null) {
            throw new NotFoundException('指定した日記IDを見つけることができませんでした');
        }
        $diary->delete();
    }
}
