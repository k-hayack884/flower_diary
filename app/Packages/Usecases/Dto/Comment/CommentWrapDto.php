<?php

namespace App\Packages\Usecases\Dto\Comment;

class CommentWrapDto
{
    /**
     * @param CommentDto $comment
     */
    public function __construct(
        public CommentDto $comment
    )
    {
    }
}
