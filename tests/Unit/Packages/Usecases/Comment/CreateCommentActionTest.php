<?php

namespace Packages\Domains\Comment;

use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\Presentations\Requests\Comment\CreateCommentRequest;
use App\Packages\Usecases\Comment\CreateCommentAction;
use App\Packages\Usecases\Dto\Comment\CommentWrapDto;
use PHPUnit\Framework\TestCase;

class CreateCommentActionTest extends TestCase
{
    public function test_作成した日記のレスポンスの型があっていること()
    {
        $request = CreateCommentRequest::create('Comment', 'POST', [
            'comment'=>[
                'comment.userId'=>'774c1092-7a0d-40b0-af6e-30bff5975e31',
                'comment.content'=>'めちゃくちゃ成長している',
            ]
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(CreateCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new CreateCommentAction(
                $mockCommentRepository
            );
        });
        $result = (app()->make(CreateCommentAction::class))->__invoke($request);

        $this->assertInstanceOf(CommentWrapDto::class, $result);
        $this->assertSame('774c1092-7a0d-40b0-af6e-30bff5975e31', $result->comment->userId);
        $this->assertSame('めちゃくちゃ成長している', $result->comment->content);
    }
}
