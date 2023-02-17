<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\Comment;
use App\Packages\Usecases\Dto\Comment\CommentDto;
use App\Packages\Usecases\Dto\Comment\CommentWrapDto;

class CommentDtoFactory
{
    public static function create(Comment $comment): CommentWrapDto
    {
        return new CommentWrapDto(
            new CommentDto(
                $comment->getCommentId()->getId(),
                $comment->getUserId()->getId(),
                $comment->getCommentContent()->getValue(),
                $comment->getCreateDate()->format('Y/m/d'),
            )
        );
    }
}
