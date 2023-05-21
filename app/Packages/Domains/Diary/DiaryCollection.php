<?php

namespace App\Packages\Domains\Diary;

use App\Exceptions\NotFoundException;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Collection;
use IteratorAggregate;

final class DiaryCollection
{
    private Collection $diaries;

    /**
     * @param Diary[] $diaries
     */
    public function __construct(array $diaries = [])
    {
        $this->diaries=(new Collection)->collect([]);
        foreach ($diaries as $diary) {
            $this->addDiary($diary);
        }
        $this->sortDate();
    }

    /**
     * @param Diary $diary
     * @return void
     */
    public function addDiary(Diary $diary): void
    {
        $this->diaries->put($diary->getDiaryId()->getId(), $diary);
        $this->sortDate();
    }

    /**
     * @return void
     */
    public function sortDate(): void
    {
        $sorted=$this->diaries->sortByDesc(function ($product, $key) {
            return $product->getCreateDate();
        });
        $this->diaries=$sorted;
    }

    /**
     * @return Diary
     */

    public function getFirstDate():Carbon
    {
       return  $this->diaries->first()->getCreateDate();
    }
    /**
     * @param DiaryId $diaryId
     * @return Diary
     * @throws NotFoundException
     */
    public function findById(DiaryId $diaryId): Diary
    {
        $diary = $this->diaries->get($diaryId->getId());
        if (is_null($diary)) {
            throw new NotFoundException('指定した日記IDが見つかりませんでした (id:' . $diaryId->getId() . ')');
        }
        if (!$diary->getDiaryId()->equals($diaryId)) {
            throw new NotFoundException('指定した日記IDが見つかりませんでした (id:' . $diaryId->getId() . ')');
        }
        return $diary;
    }

    /**
     * @param Diary $diary
     * @return void
     */
    public function delete(Diary $diary): void
    {
        $this->diaries->forget($diary->getDiaryId()->getId());
    }

    /**
     * @param int $value
     * @return Closure|null
     */
    public function getValue(int $value): ?Closure
    {
        return $this->diaries->get($value);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->diaries->toArray();
    }
}
