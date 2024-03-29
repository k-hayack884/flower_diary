<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Domains\User\UserRepositoryInterface;
use App\Packages\Presentations\Requests\Comment\CreateCommentRequest;
use App\Packages\Usecases\Dto\Comment\CommentWrapDto;
use Illuminate\Support\Facades\Log;

class CreateCommentAction
{
    private CommentRepositoryInterface $commentRepository;

    /**
     * @param CommentRepositoryInterface $commentRepository
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(CommentRepositoryInterface $commentRepository,UserRepositoryInterface $userRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->userRepository=$userRepository;
    }

    /**
     * @param CreateCommentRequest $createCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        CreateCommentRequest $createCommentRequest
    ): CommentWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $diaryId=$createCommentRequest->getDiaryId();
        $userId = $createCommentRequest->getUserId();
        $userName=$this->userRepository->findById(new UserId($userId))->getName();
        $userImage=$this->userRepository->findById(new UserId($userId))->getImage();

        $commentContent = $createCommentRequest->getCommentContent();

        try {
            $commentId = new CommentId();
            $userId = new UserId($userId);

            $commentContent = new CommentContent($commentContent);
            $comment = new Comment(
                $commentId,
                $userId,
                $userName,
                $userImage,
                $commentContent
            );
            $commentCollection = new CommentCollection();
            $commentCollection->addComment($comment);
            $this->commentRepository->save($commentCollection,$diaryId);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }
        return CommentDtoFactory::create($comment);
    }
}
