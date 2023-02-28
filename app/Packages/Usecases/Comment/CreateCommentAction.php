<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Presentations\Requests\Comment\CreateCommentRequest;
use App\Packages\Usecases\Dto\Comment\CommentWrapDto;

class CreateCommentAction
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
     * @param CreateCommentRequest $createCommentRequest
     * @return CommentWrapDto
     */
    public function __invoke(
        CreateCommentRequest $createCommentRequest
    ): CommentWrapDto
    {
        $userId = $createCommentRequest->getUserId();
        $commentContent = $createCommentRequest->getCommentContent();


        try {
            $commentId = new CommentId();
            $userId = new UserId($userId);
            $commentContent = new CommentContent($commentContent);
            $comment = new Comment(
                $commentId,
                $userId,
                $commentContent
            );
            $commentCollection = new CommentCollection();
            $this->commentRepository->save($commentCollection);
        } catch (\DomainException $e) {
            abort(400,$e);

        }
        return CommentDtoFactory::create($comment);
    }
}
