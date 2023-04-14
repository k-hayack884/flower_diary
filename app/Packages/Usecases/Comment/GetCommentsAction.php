<?php

namespace App\Packages\Usecases\Comment;

use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Presentations\Requests\Comment\GetCommentsRequest;
use App\Packages\Usecases\Dto\Comment\CommentDto;
use App\Packages\Usecases\Dto\Comment\CommentsWrapDto;
use Illuminate\Support\Facades\Log;

class GetCommentsAction
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
     * @param GetCommentsRequest $getCommentRequest
     * @return CommentsWrapDto
     */
    public function __invoke(GetCommentsRequest $getCommentRequest
    ): CommentsWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $comments = $this->commentRepository->find();
        $commentCollection=new CommentCollection($comments);
        $commentDtos = [];

        foreach ($commentCollection->toArray() as $comment) {
            $commentDtos[] =
                new CommentDto(
                    $comment->getCommentId()->getId(),
                    $comment->getUserId()->getId(),
                    $comment->getUserName(),
                    $comment->getUserImage(),
                    $comment->getCommentContent()->getValue(),
                    $comment->getCreateDate()->format('Y/m/d'),
                );
        }
        Log::info(__METHOD__, ['終了']);

        return new CommentsWrapDto($commentDtos);
    }
}
