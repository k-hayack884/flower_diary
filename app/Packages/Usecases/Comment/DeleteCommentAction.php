<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Presentations\Requests\Comment\DeleteCommentRequest;

class DeleteCommentAction
{
    private CommentRepositoryInterface $commentRepository;

    /**
     * @param CommentRepositoryInterface $commentRepository
     */
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * @param DeleteCommentRequest $deleteCommentRequest
     * @param string $commentIdValue
     * @return void
     */

    public function __invoke(
        DeleteCommentRequest $deleteCommentRequest,
        string               $commentIdValue
    ): void
    {
        $requestArray = [
            'comment.userId' => $deleteCommentRequest->getUserId(),
        ];
        $this->commentRepository->findByUserId(new UserId($requestArray['comment.userId']));
        try {
            $commentId = new CommentId($commentIdValue);
            $this->commentRepository->delete($commentId);
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
