<?php

namespace App\Packages\Domains\Comment;

use App\Packages\Domains\User\UserId;

interface CommentRepositoryInterface
{
    public function find();

    public function findByCommentId(CommentId $commentId);

    public function findByUserId(UserId $userId);

    public function save(CommentCollection $comment);

    public function delete(CommentId $commentId);
}
