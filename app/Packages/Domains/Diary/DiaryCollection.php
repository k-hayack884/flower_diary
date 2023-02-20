<?php

namespace App\Packages\Domains\Diary;

use App\Exceptions\NotFoundException;
use Closure;
use Illuminate\Support\Collection;
use IteratorAggregate;

class DiaryCollection extends Collection implements IteratorAggregate
{
    /**
     * @param Diary[] $diaries
     */
    public function __construct(array $diaries = [])
    {
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
        $this->put($diary->getDiaryId()->getId(), $diary);
        $this->sortDate();
    }

    /**
     * @return void
     */
    private function sortDate(): void
    {
        $this->sortByDesc(function ($product, $key) {
            return $product->getCreateDate();
        });
    }

    /**
     * @param DiaryId $diaryId
     * @return Diary
     */
    public function findById(DiaryId $diaryId): Diary
    {
        $diary = $this->get($diaryId->getId());
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
        $this->forget($diary->getDiaryId()->getId());
    }

    /**
     * @param int $value
     * @return Closure|null
     */
    public function getValue(int $value): ?Closure
    {
        return $this->get($value);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
