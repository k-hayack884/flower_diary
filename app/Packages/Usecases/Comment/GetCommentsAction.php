<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Presentations\Requests\Comment\GetCommentsRequest;
use App\Packages\Usecases\Dto\Comment\CommentDto;
use App\Packages\Usecases\Dto\Comment\CommentsWrapDto;

class GetCommentsAction
{

    private CommentRepositoryInterface $CommentRepository;

    /**
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param GetCommentsRequest $getCommentRequest
     * @return DiariesWrapDto
     */
    public function __invoke(GetCommentsRequest $getCommentRequest
    ): CommentsWrapDto
    {
        $commentCollection = $this->commentRepository->find();
        $commentDtos = [];

        foreach ($commentCollection as $comment) {
            $commentDtos[] =
                new CommentDto(
                    $comment->getCommentId()->getId(),
                    $comment->getUserId()->getId(),
                    $comment->getCommentContent()->getValue(),
                    $comment->getCreateDate()->format('Y/m/d'),
                );
        }
        return new CommentsWrapDto($commentDtos);
    }
}
