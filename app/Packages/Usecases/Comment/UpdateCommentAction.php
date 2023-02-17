<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Presentations\Requests\Comment\UpdateCommentRequest;
use App\Packages\Usecases\Dto\Comment\CommentWrapDto;

class UpdateCommentAction
{
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function __invoke(
        UpdateCommentRequest $updateCommentRequest,
        string               $commentId
    ): CommentWrapDto
    {
        $requestArray = [
            'comment.userId' => $updateCommentRequest->getUserId(),
            'comment.content' => $updateCommentRequest->getCommentContent(),
        ];
        $this->commentRepository->findByUserId(new UserId($requestArray['comment.userId']));
        $comment = $this->commentRepository->findByCommentId(new CommentId($commentId));
        $updateUserId = $requestArray['comment.userId'];
        $updateContent = $comment->getCommentContent()->update($requestArray['comment.content']);

        try {
            $updateComment = new Comment(
                new CommentId($commentId),
                new UserId($updateUserId),
                $updateContent,
                $comment->getCreateDate()
            );
            $commentCollection = new CommentCollection();
            $this->commentRepository->save($commentCollection);
        } catch (Exception $e) {
            throw  $e;
        }
        return CommentDtoFactory::create($updateComment);
    }
}
