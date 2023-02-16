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
    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function __invoke(
        CreateCommentRequest $createCommentRequest
    ): CommentWrapDto
    {
        $requestArray = [
            'comment.userId'=>$createCommentRequest->getUserId(),
            'comment.content' => $createCommentRequest->getCommentContent()
        ];
        try {
            $commentId = new CommentId();
            $userId=new UserId($requestArray['comment.userId']);
            $commentContent = new CommentContent($requestArray['comment.content']);
            $comment = new Comment(
                $commentId,
                $userId,
                $commentContent
            );
            $commentCollection = new CommentCollection();
            $this->commentRepository->save($commentCollection);
        } catch (Exception $e) {
            throw  $e;
        }
        return CommentDtoFactory::create($comment);
    }
}
