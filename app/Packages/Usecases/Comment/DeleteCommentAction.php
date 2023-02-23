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
     * @param DeleteCommentRequest $deleteCommentRequest
     * @return void
     * @throws Exception
     */

    public function __invoke(
        DeleteCommentRequest $deleteCommentRequest,
    ): void
    {
        $commentId=$deleteCommentRequest->getId();
        $userId=$deleteCommentRequest->getUserId();

        try {
            $deleteCommentId=new CommentId($commentId);
            $deleteUserId=new UserId($userId);

            $comment=$this->commentRepository->findByCommentId($deleteCommentId);
            $this->commentRepository->findByUserId($deleteUserId);
            $this->commentRepository->delete($comment->getCommentId());
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
