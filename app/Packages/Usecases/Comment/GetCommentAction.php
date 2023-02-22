<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Presentations\Requests\Comment\GetCommentRequest;
use App\Packages\Usecases\Dto\Comment\CommentWrapDto;

class GetCommentAction
{
    /**
     * @var CommentRepositoryInterface
     */
    private CommentRepositoryInterface $commentRepository;
    /**
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param GetCommentRequest $getCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        GetCommentRequest $getCommentRequest,
    ): CommentWrapDto
    {
        $commentId=$getCommentRequest->getId();
        $hitComment = $this->commentRepository->findByCommentId(new CommentId($commentId));

        return CommentDtoFactory::create($hitComment);
    }
}
