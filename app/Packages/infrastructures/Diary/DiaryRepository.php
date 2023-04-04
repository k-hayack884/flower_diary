<?php

namespace App\Packages\infrastructures\Diary;

use App\Exceptions\NotFoundException;
use App\Models\Comment;
use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryImage;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use Carbon\Carbon;

class DiaryRepository implements DiaryRepositoryInterface
{

    public function find(): array
    {
        $diaries = [];
        $allDiaries = \App\Models\Diary::all();
        foreach ($allDiaries as $diary) {
            $comments = Comment::where('diary_id', $diary->diary_id)->get();
            $commentIds = [];
            foreach ($comments as $comment) {
                $commentIds[] = $comment->comment_id;
            }
            $diaries[] = new Diary(
                new DiaryId($diary->diary_id),
                new DiaryContent($diary->diary_content),
                new DiaryImage($diary->image),
                $commentIds,
                new Carbon($diary->create_date),

            );
        }
        return $diaries;
    }

    public function findById(DiaryId $diaryId): Diary
    {
        $commentIds = [];

        $diary = \App\Models\Diary::where('diary_id', $diaryId->getId())->first();

        if ($diary === null) {
            throw new NotFoundException('指定した日記IDを見つけることができませんでした');
        }
        $comments = Comment::where('diary_id', $diaryId->getId())->get();

        foreach ($comments as $comment) {
            $commentIds[] = $comment->comment_id;
        }
        return new Diary(
            new DiaryId($diary->diary_id),
            new DiaryContent($diary->diary_content),
            new DiaryImage($diary->image),
            $commentIds,
            new Carbon($diary->create_date),

        );
    }

    public function save(DiaryCollection $diary, string $plantUnitId): void
    {
        $collectionArray = $diary->toArray();


        foreach ($collectionArray as $diary) {
            \App\Models\Diary::updateOrCreate(['diary_id' => $diary->getDiaryId()->getId()],
                [
                    'diary_id' => $diary->getDiaryId()->getId(),
                    'plant_unit_id' => $plantUnitId,
                    'diary_content' => $diary->getDiaryContent()->getvalue(),
                    'create_date' => $diary->getCreateDate()->format('Y/m/d'),
                    'image' =>$diary->getDiaryImage()->getvalue()
                ]);
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
