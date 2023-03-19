<?php

namespace Packages\infrastructures\Repositories\Comment;

use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Comment\CommentRepository;
use PHPUnit\Framework\TestCase;

class CommentRepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->commentRepository = new CommentRepository();
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
        $this->commentRepository->save($commentCollection);

        $addCommentArray=$this->commentRepository->find();
        $this->assertSame($addComment[0]->getCommentId(), $addCommentArray[3]->getCommentId());
    }
}
