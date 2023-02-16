<?php

namespace Packages\infrastructures\Repositories\Comment;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Comment\MockCommentRepository;
use PHPUnit\Framework\TestCase;

class MockCommentRepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->mockCommentRepository = new MockCommentRepository();
    }

    public function test_コメントコレクションを返す()
    {
        $result = $this->mockCommentRepository->find();
        $this->assertIsArray($result);
    }

    public function test_コメントIDから検索して情報を取得する()
    {
        $commentId = new CommentId('983c1092-7a0d-40b0-af6e-30bff5975e31');
        $comment = $this->mockCommentRepository->findByCommentId($commentId);

        $this->assertSame($commentId->getId(), $comment->getCommentId()->getId());
    }
    public function test_ユーザーIDから検索して情報を取得する()
    {
        $userId = new UserId('111c1092-7a0d-40b0-af6e-30bff5975e31');
        $comments = $this->mockCommentRepository->findByUserId($userId);

        $this->assertIsArray($comments);
        $this->assertCount(2,$comments);
    }


    public function test_存在しない設定IDから検索すると例外を出すこと()
    {
        $commentId = new CommentId('111c1111-1a1d-11b1-af1e-11bff1111e11');

        $this->expectExceptionMessage('指定したコメントIDは見つかりませんでした (id:' . $commentId->getId() . ')');
        $this->expectException(NotFoundException::class);
        $comment = $this->mockCommentRepository->findByCommentId($commentId);
    }
    public function test_存在しないユーザーIDから検索すると例外を出すこと()
    {
        $userId = new UserId('111c1111-1a1d-11b1-af1e-11bff1111e11');

        $this->expectExceptionMessage('指定したユーザーIDは見つかりませんでした (id:' . $userId->getId() . ')');
        $this->expectException(NotFoundException::class);
        $comment = $this->mockCommentRepository->findByUserId($userId);
    }

    public function test_設定を追加する()
    {
        $addComment[]=
            new Comment(
                new CommentId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('555c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CommentContent('おっぱっぴー'),
            );
        $commentCollection=new CommentCollection($addComment);
        $this->mockCommentRepository->save($commentCollection);

        $addCommentArray=$this->mockCommentRepository->find();
        $this->assertSame($addComment[0]->getCommentId(), $addCommentArray[3]->getCommentId());
    }

    public function test_設定を削除する()
    {
        $commentId = new CommentId('983c1092-7a0d-40b0-af6e-30bff5975e31');
        $comment=$this->mockCommentRepository->findByCommentId($commentId);
        $this->mockCommentRepository->delete($commentId);
        $this->expectException(NotFoundException::class);
        $Comment = $this->mockCommentRepository->findByCommentId($commentId);
    }
}
