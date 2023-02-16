<?php

namespace Packages\Domains\Comment;

use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\Domains\User\UserId;
use Carbon\Carbon;
use DomainException;
use PHPUnit\Framework\TestCase;

class CommentTest extends TestCase
{
    public function test_コメントを作成する()
    {
        $commentId = new CommentId('558c1092-7a0d-40b0-af6e-30bff5975e31');
        $userId = new UserId('334c1092-7a0d-40b0-af6e-30bff5975e31');
        $commentContent = new CommentContent('お元気ですね');
        $comment = new Comment($commentId, $userId, $commentContent);

        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertInstanceOf(CommentId::class, $comment->getCommentId());
        $this->assertInstanceOf(UserId::class, $comment->getUserId());
        $this->assertInstanceOf(CommentContent::class, $comment->getCommentContent());
        $this->assertInstanceOf(Carbon::class, $comment->getCreateDate());
    }

    public function test_コメントを編集する()
    {
        $commentId = new CommentId('558c1092-7a0d-40b0-af6e-30bff5975e31');
        $userId = new UserId('334c1092-7a0d-40b0-af6e-30bff5975e31');
        $commentContent = new CommentContent('今日も元気に育ってます');
        $comment = new Comment($commentId, $userId, $commentContent);

        $comment->updateComment($userId, '書き換え完了');

        $this->assertInstanceOf(Comment::class, $comment);
        $this->assertSame('書き換え完了', $comment->getCommentContent()->getValue());
    }

    public function test_コメントを編集もユーザーIDが違うのでエラーを出す()
    {
        $this->expectExceptionMessage('コメントのユーザーIDが一致しませんでした');
        $this->expectException(DomainException::class);

        $commentId = new CommentId('558c1092-7a0d-40b0-af6e-30bff5975e31');
        $userId = new UserId('334c1092-7a0d-40b0-af6e-30bff5975e31');
        $commentContent = new CommentContent('今日も元気に育ってます');
        $comment = new Comment($commentId, $userId, $commentContent);

        $differentUserId = new UserId(new Uuid());
        $comment->updateComment($differentUserId, '書き換え完了');
    }

}
