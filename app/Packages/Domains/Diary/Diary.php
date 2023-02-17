<?php

namespace App\Packages\Domains\Diary;

use Carbon\Carbon;

class Diary
{
    private DiaryId $diaryId;
    private DiaryContent $diaryContent;
    private array $comments = [];
    private Carbon $createDate;

    public function __construct(DiaryId $diaryId, DiaryContent $diaryContent,array $comments=null,Carbon $createDate=null)
    {
        $this->diaryId = $diaryId;
        $this->diaryContent = $diaryContent;
        if($comments===null){
            $this->comments=[];
        }else{
            $this->comments = $comments;
        }
        if($createDate===null){
            $this->createDate = Carbon::now();;
        }else{
            $this->createDate = $createDate;
        }

    }

    public function updateContent(string $content): void
    {
        $diaryContent=$this->diaryContent->update($content);
        $this->diaryContent=$diaryContent;
    }

    /**
     * @return DiaryId
     */
    public function getDiaryId(): DiaryId
    {
        return $this->diaryId;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @return DiaryContent
     */
    public function getDiaryContent(): DiaryContent
    {
        return $this->diaryContent;
    }

    /**
     * @return Carbon
     */
    public function getCreateDate(): Carbon
    {
        return $this->createDate;
    }

}

