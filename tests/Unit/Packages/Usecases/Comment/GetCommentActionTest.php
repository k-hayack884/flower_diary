<?php

namespace Packages\Usecases\Comment;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\Presentations\Requests\Comment\GetCommentRequest;
use App\Packages\Usecases\Comment\GetCommentAction;
use App\Packages\Usecases\Dto\Comment\CommentWrapDto;
use PHPUnit\Framework\TestCase;

class GetCommentActionTest extends TestCase
{
    public function test_コメント詳細のレスポンスの型があっていること()
    {
        $commentId = '983c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = GetCommentRequest::create('Comment', 'GET', []);
        $mockCommentSettingRepository = app()->make(MockCommentRepository::class);

        app()->bind(GetCommentAction::class, function () use (
            $mockCommentSettingRepository
        ) {
            return new GetCommentAction(
                $mockCommentSettingRepository
            );
        });
        $result = (app()->make(GetCommentAction::class))->__invoke($request, $commentId);

        $this->assertInstanceOf(CommentWrapDto::class, $result);
        $this->assertSame('983c1092-7a0d-40b0-af6e-30bff5975e31', $result->comment->commentId);
        $this->assertSame('893c1092-7a0d-40b0-af6e-30bff5975e31', $result->comment->userId);
        $this->assertSame('とてもいい', $result->comment->content);
    }

    public function test_存在しないIDの場合エラーを出すこと()
    {
        $commentId = new Uuid();
        $request = GetCommentRequest::create('Comment', 'GET', []);
        $mockCommentSettingRepository = app()->make(MockCommentRepository::class);

        app()->bind(GetCommentAction::class, function () use (
            $mockCommentSettingRepository
        ) {
            return new GetCommentAction(
                $mockCommentSettingRepository
            );
        });
        $this->expectExceptionMessage('指定したコメントIDは見つかりませんでした (id:' . $commentId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(GetCommentAction::class))->__invoke($request, $commentId);

    }
}
