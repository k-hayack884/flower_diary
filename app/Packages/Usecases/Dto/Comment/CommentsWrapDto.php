<?php

namespace App\Packages\Usecases\Dto\Comment;

class CommentsWrapDto
{
    public function __construct(
        public array $comments
    )
    {
    }
}
