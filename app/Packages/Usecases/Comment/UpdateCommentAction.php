<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Presentations\Requests\Comment\UpdateCommentRequest;
use App\Packages\Usecases\Dto\Comment\CommentWrapDto;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdateCommentAction
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
     * @param UpdateCommentRequest $updateCommentRequest
     * @return CommentWrapDto
     * @throws Exception
     */
    public function __invoke(
        UpdateCommentRequest $updateCommentRequest,
    ): CommentWrapDto
    {
        Log::info(__METHOD__, ['開始']);


        $commentId = $updateCommentRequest->getId();
        $userId = $updateCommentRequest->getUserId();
        $content = $updateCommentRequest->getCommentContent();
        $this->commentRepository->findByUserId(new UserId($userId));
        $comment = $this->commentRepository->findByCommentId(new CommentId($commentId));
        dd($comment);
        $updateContent = $comment->getCommentContent()->update($content);

        try {
            $updateComment = new Comment(
                new CommentId($commentId),
                new UserId($userId),
                $updateContent,
                $comment->getCreateDate()
            );
            $commentCollection = new CommentCollection();
            $commentCollection->addComment($updateComment);
            $this->commentRepository->save($commentCollection);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400, $e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return CommentDtoFactory::create($updateComment);
    }
}
