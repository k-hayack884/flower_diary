<?php

namespace Packages\Usecases\Comment;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\Presentations\Requests\Comment\UpdateCommentRequest;
use App\Packages\Usecases\Comment\UpdateCommentAction;
use PHPUnit\Framework\TestCase;

class UpdateCommentActionTest extends TestCase
{
    public function test_変更をしたコメントのレスポンスの型があっていること()
    {
        $request = UpdateCommentRequest::create('comment', 'POST', [
            'commentId' => '666c1092-7a0d-40b0-af6e-30bff5975e31',
            'commentUserId' => '222c1092-7a0d-40b0-af6e-30bff5975e31',
            'commentContent' => '書き換え完了',
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(UpdateCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new UpdateCommentAction(
                $mockCommentRepository
            );
        });

        $prevComment = $mockCommentRepository->findByCommentId(new CommentId($request->getId()));
        $result = (app()->make(UpdateCommentAction::class))->__invoke($request);

        $this->assertSame('書き換え完了', $result->comment->content);
        $this->assertEquals('222c1092-7a0d-40b0-af6e-30bff5975e31', $result->comment->userId);
        $this->assertNotEquals($prevComment->getCommentContent()->getvalue(), $result->comment->content);
    }

    public function test_存在しないコメントIDを入力するとエラーを返すこと()
    {
        $request = UpdateCommentRequest::create('comment', 'POST', [
            'commentId' => '334c1092-7a0d-40b0-af6e-30bff5975e31',
            'commentUserId' => '222c1092-7a0d-40b0-af6e-30bff5975e31',
            'commentContent' => '書き換え完了',
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(UpdateCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new UpdateCommentAction(
                $mockCommentRepository
            );
        });
        $this->expectExceptionMessage('指定したコメントIDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(UpdateCommentAction::class))->__invoke($request);
    }

    public function test_存在しないユーザーIDを入力するとエラーを返すこと()
    {
        $request = UpdateCommentRequest::create('comment', 'POST', [
            'commentId' => '666c1092-7a0d-40b0-af6e-30bff5975e31',
            'commentUserId' => '833c1092-7a0d-40b0-af6e-30bff5975e31',
            'commentContent' => '書き換え完了',
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(UpdateCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new UpdateCommentAction(
                $mockCommentRepository
            );
        });
        $this->expectExceptionMessage('指定したユーザーIDは見つかりませんでした (id:833c1092-7a0d-40b0-af6e-30bff5975e31');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(UpdateCommentAction::class))->__invoke($request);
    }
}
