<?php

namespace App\Packages\Domains\Comment;

use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\User\UserId;

interface CommentRepositoryInterface
{
    public function find():array;
    public function findByDiaryId(DiaryId $diaryId):array;

    public function findByCommentId(CommentId $commentId):Comment;

    public function diffUserCheck(UserId $userId,CommentId $commentId):void;

    public function save(CommentCollection $comment,string $diaryId):void;

    public function delete(CommentId $commentId):void;
}
