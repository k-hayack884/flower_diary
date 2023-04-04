<?php

namespace App\Packages\Domains\Diary;

use App\Packages\Domains\Comment\CommentId;
use Carbon\Carbon;

class Diary
{
    /**
     * @var DiaryId
     * @var DiaryContent
     * @var CommentId[]
     * @var Carbon
     */
    private DiaryId $diaryId;
    private DiaryContent $diaryContent;
    private array $comments = [];
    private Carbon $createDate;
    private DiaryImage $diaryImage;

    /**
     * @param DiaryId $diaryId
     * @param DiaryContent $diaryContent
     * @param CommentId[]|null $comments
     * @param Carbon|null $createDate
     */
    public function __construct(DiaryId $diaryId, DiaryContent $diaryContent,DiaryImage $diaryImage,array $comments=null,Carbon $createDate=null,)
    {
        $this->diaryId = $diaryId;
        $this->diaryContent = $diaryContent;
        $this->diaryImage=$diaryImage;
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

    /**
     * @param string $content
     * @return void
     */
    public function updateContent(string $content): void
    {
        $diaryContent=$this->diaryContent->update($content);
        $this->diaryContent=$diaryContent;
    }
    public function getDiaryImage(): DiaryImage
    {
        return $this->diaryImage;
    }
    public function addCommentId(string $commentId):void
    {
        $this->comments[]=$commentId;
    }

    /**
     * @return DiaryId
     */
    public function getDiaryId(): DiaryId
    {
        return $this->diaryId;
    }

    /**
     * @return CommentId[]
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

    /**
     * @return DiaryImage
     */

}

