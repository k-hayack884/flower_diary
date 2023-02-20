<?php

namespace App\Packages\Domains\Comment;

use App\Packages\Domains\User\UserId;

interface CommentRepositoryInterface
{
    public function find():array;

    public function findByCommentId(CommentId $commentId):Comment;

    public function findByUserId(UserId $userId):Comment;

    public function save(CommentCollection $comment):void;

    public function delete(CommentId $commentId):void;
}
