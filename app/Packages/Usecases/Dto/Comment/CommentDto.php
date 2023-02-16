<?php

namespace App\Packages\Usecases\Dto\Comment;

class CommentDto
{
    public function __construct(
        public string $commentId,
        public string $userId,
        public string $content,
        public string $createDate,
    )
    {
    }
}
