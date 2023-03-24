<?php

namespace App\Packages\Usecases\Comment;

use App\Exceptions\ForbiddenException;
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
        $diaryId = $updateCommentRequest->getDiaryId();
        $userId = $updateCommentRequest->getUserId();
        $content = $updateCommentRequest->getCommentContent();
        $comment = $this->commentRepository->findByCommentId(new CommentId($commentId));
        $updateContent = $comment->getCommentContent()->update($content);



        try {
            $this->commentRepository->diffUserCheck(new UserId($userId),new CommentId($commentId));
            $updateComment = new Comment(
                new CommentId($commentId),
                new UserId($userId),
                $updateContent,
                $comment->getCreateDate()
            );
            $commentCollection = new CommentCollection();
            $commentCollection->addComment($updateComment);
            $this->commentRepository->save($commentCollection,$diaryId);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400, $e);
        }catch (ForbiddenException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(403, $e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return CommentDtoFactory::create($updateComment);
    }
}
