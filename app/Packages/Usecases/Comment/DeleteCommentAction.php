<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Presentations\Requests\Comment\DeleteCommentRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        Log::info(__METHOD__, ['開始']);
        $commentId=$deleteCommentRequest->getId();
        $userId=$deleteCommentRequest->getUserId();

        try {
            $deleteCommentId=new CommentId($commentId);
            $deleteUserId=new UserId($userId);

            $this->commentRepository->findByUserId($deleteUserId);
            $this->commentRepository->delete($deleteCommentId);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }
    }
}
