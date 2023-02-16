<?php

namespace Packages\Usecases\Comment;

use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\Presentations\Requests\Comment\GetCommentsRequest;
use App\Packages\Usecases\Comment\GetCommentsAction;
use App\Packages\Usecases\Dto\Comment\CommentsWrapDto;
use PHPUnit\Framework\TestCase;

class GetCommentsActionTest extends TestCase
{
    public function test_日記のレスポンスの型があっていること()
    {
        $request = GetCommentsRequest::create('Comment', 'GET', []);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(GetCommentsAction::class, function () use (
            $mockCommentRepository
        ) {
            return new GetCommentsAction(
                $mockCommentRepository
            );
        });
        $result = (app()->make(GetCommentsAction::class))->__invoke($request);

        $this->assertInstanceOf(CommentsWrapDto::class, $result);
    }
}
