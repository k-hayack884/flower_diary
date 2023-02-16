<?php

namespace Packages\Domains\Comment;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\User\UserId;
use PHPUnit\Framework\TestCase;

class CommentCollectionTest extends TestCase
{
    public function test_オブジェクトが生成されること()
    {
        $comments = [
            new Comment(
                new CommentId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('とてもいい'),
            ),
            new Comment(
                new CommentId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('111c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('ほげえ'),
            )
        ];

        $commentCollection = new CommentCollection($comments);

        $this->assertCount(count($comments), $commentCollection);
        foreach ($commentCollection as $index => $comments) {
            $this->assertSame($index, $comments->getCommentId()->getId());
        }
    }

    public function test_空のオブジェクトが生成されること()
    {
        $comments = [];

        $commentCollection = new CommentCollection($comments);
        $this->assertCount(count($comments), $commentCollection);

    }

    public function test_新しい設定を追加すること()
    {
        $comments = [
            new Comment(
                new CommentId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('とてもいい'),
            ),
            new Comment(
                new CommentId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('111c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('ほげえ'),
            )
        ];

        $commentCollection = new CommentCollection($comments);

        $addComment =
            new Comment(
                new CommentId('514c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('721c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('やったぜ。'),
            );
        $commentCollection->addComment($addComment);
        $comments[] = $addComment;

        $this->assertCount(count($comments), $commentCollection);
        foreach ($commentCollection as $index => $comment) {
            $this->assertSame($index, $comment->getCommentId()->getId());
        }

    }
    public function test_設定を削除すること()
    {
        $comments = [
            new Comment(
                new CommentId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('とてもいい'),
            ),
            new Comment(
                new CommentId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('111c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('ほげえ'),
            )
        ];

        $commentCollection = new CommentCollection($comments);
        $commentId = new CommentId('333c1092-7a0d-40b0-af6e-30bff5975e31');
        $deleteComment = $commentCollection->findById($commentId);

        $commentCollection->delete($deleteComment);
        $this->expectException(NotFoundException::class);
        $getComment = $commentCollection->findById($commentId);
    }
}
