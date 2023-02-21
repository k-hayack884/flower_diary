<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Presentations\Requests\Comment\DeleteCommentRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

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
    ): void
    {

        $commentId=new CommentId($deleteCommentRequest->getId());
        $userId=new UserId($deleteCommentRequest->getUserId());
        try {
            $this->commentRepository->findByCommentId($commentId);
            $this->commentRepository->findByUserId($userId);
            $this->commentRepository->delete($commentId);
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
