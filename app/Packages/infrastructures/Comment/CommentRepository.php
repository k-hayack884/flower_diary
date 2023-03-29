<?php

namespace App\Packages\infrastructures\Comment;

use App\Exceptions\ForbiddenException;
use App\Exceptions\NotFoundException;
use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\User\UserId;
use Carbon\Carbon;

class CommentRepository implements CommentRepositoryInterface
{

    public function find(): array
    {
        $comments = [];

        $allComments = \App\Models\Comment::all();
        foreach ($allComments as $comment) {
            $comments[] = new Comment(
                new CommentId($comment->comemnt_id),
                new UserId($comment->user_id),
                new CommentContent($comment->comment_content),
                new Carbon($comment->create_date),
            );
        }
        return $comments;
    }

    public function findByCommentId(CommentId $commentId): Comment
    {
        $comment = \App\Models\Comment::where('comment_id', $commentId->getId())->first();

        if ($comment === null) {
            throw new NotFoundException('指定したコメントIDを見つけることができませんでした');
        }
        return new Comment(
            new CommentId($comment->comemnt_id),
            new UserId($comment->user_id),
            new CommentContent($comment->comment_content),
            new Carbon($comment->create_date),
        );

    }

    public function diffUserCheck(UserId $userId, CommentId $commentId): void
    {
        $hitCommentUserId = \App\Models\Comment::where('comment_id', $commentId->getId())->first('user_id');
        if ($hitCommentUserId === null) {
            throw new NotFoundException('指定したコメントIDのユーザーを見つけることができませんでした');
        }
        $hitCommentUserIdObject = new UserId($hitCommentUserId->user_id);
        if (!$hitCommentUserIdObject->equals($userId)) {
            throw new ForbiddenException('コメントの投稿ユーザーIDとユーザーIDが違っています');
        }
    }

    public function save(CommentCollection $comment, string $diaryId): void
    {
        $collectionArray = $comment->toArray();

        foreach ($collectionArray as $comment) {
            \App\Models\Comment::updateOrCreate(['comment_id' => $comment->getCommentId()->getId()],
                ['comment_id' => $comment->getCommentId()->getId(),
                    'diary_id' => $diaryId,
                    'user_id' => $comment->getUserId()->getId(),
                    'comment_content' => $comment->getCommentContent()->getvalue(),
                    'create_date' => $comment->getCreateDate()->format('Y/m/d')]);
        }
    }

    public function delete(CommentId $commentId): void
    {
        $comment = \App\Models\Comment::where('comment_id', $commentId->getId())->first();

        if ($comment === null) {
            throw new NotFoundException('指定したコメントIDを見つけることができませんでした');
        }
        $comment->delete();
    }
}
