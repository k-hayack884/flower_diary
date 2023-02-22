<?php

namespace Packages\Domains\Comment;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\User\UserId;
use Carbon\Carbon;
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
        $commentToArray = $commentCollection->toArray();
        $this->assertCount(count($comments), $commentToArray);

        foreach ($commentToArray as $index => $comment) {
            $this->assertSame($index, $comment->getCommentId()->getId());
        }
    }

    public function test_空のオブジェクトが生成されること()
    {
        $comments = [];

        $commentCollection = new CommentCollection($comments);
        $commentToArray = $commentCollection->toArray();
        $this->assertEmpty($commentToArray);
        $this->assertCount(count($comments), $commentToArray);

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
        $commentToArray = $commentCollection->toArray();

        $this->assertCount(count($comments), $commentToArray);
        foreach ($commentToArray as $index => $comment) {
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

    public function test_オブジェクトの内容が日付順で並び変えられること()
    {
        $before1DayDate = Carbon::yesterday();
        $nowDate = Carbon::now();
        $after1dayDate = Carbon::tomorrow();
        $after1HourDate = Carbon::now()->addHours(1);

        $comments = [
            new Comment(
                new CommentId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('昨日'),
                $before1DayDate
            ),
            new Comment(
                new CommentId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('明日'),
                $after1dayDate
            ),
            new Comment(
                new CommentId('888c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('今日'),
                $nowDate
            ),
            new Comment(
                new CommentId('999c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('今日＋1時間'),
                $after1HourDate
            ),
        ];
        $commentCollection = new CommentCollection($comments);
        $commentToArray = $commentCollection->toArray();
        foreach ($commentToArray as $value) {
            $results[] = $value->getCommentContent()->getValue();
        }
        $this->assertSame('明日', $results[0]);
        $this->assertSame('今日＋1時間', $results[1]);
        $this->assertSame('今日', $results[2]);
        $this->assertSame('昨日', $results[3]);
    }
}
