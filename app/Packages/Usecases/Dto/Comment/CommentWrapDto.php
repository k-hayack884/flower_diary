<?php

namespace App\Packages\Usecases\Dto\Comment;

class CommentWrapDto
{
    public function __construct(
        public CommentDto $comment
    )
    {
    }
}
