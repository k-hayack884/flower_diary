<?php

namespace App\Packages\Usecases\Dto\Comment;

class CommentsWrapDto
{
    /**
     * @param array $comments
     */
    public function __construct(
        public array $comments
    )
    {
    }
}
