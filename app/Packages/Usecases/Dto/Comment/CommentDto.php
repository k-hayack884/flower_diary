<?php

namespace App\Packages\Usecases\Dto\Comment;

class CommentDto
{
    /**
     * @param string $commentId
     * @param string $userId
     * @param string $userName
     * @param string $userImage
     * @param string $content
     * @param string $createDate
     */
    public function __construct(
        public string $commentId,
        public string $userId,
        public string $userName,
        public string $userImage,
        public string $content,
        public string $createDate,
    )
    {
    }
}
