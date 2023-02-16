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
        $commentId = '983c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = UpdateCommentRequest::create('Comment', 'POST', [
            'comment' => [
                'comment.content' =>'書き換え完了',
                'comment.userId'=>'893c1092-7a0d-40b0-af6e-30bff5975e31'
            ]
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(UpdateCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new UpdateCommentAction(
                $mockCommentRepository
            );
        });

        $prevComment = $mockCommentRepository->findByCommentId(new CommentId($commentId));
        $result = (app()->make(UpdateCommentAction::class))->__invoke($request, $commentId);

        $this->assertSame('書き換え完了', $result->comment->content);
        $this->assertEquals('893c1092-7a0d-40b0-af6e-30bff5975e31',$result->comment->userId);
        $this->assertNotEquals($prevComment->getCommentContent()->getvalue(), $result->comment->content);
    }

    public function test_存在しないコメントIDを入力するとエラーを返すこと()
    {
        $commentId = '334c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = UpdateCommentRequest::create('Comment', 'POST', [
            'comment' => [
                'comment.content' =>'書き換え完了',
                'comment.userId'=>'893c1092-7a0d-40b0-af6e-30bff5975e31'
            ]
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(UpdateCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new UpdateCommentAction(
                $mockCommentRepository
            );
        });
        $this->expectExceptionMessage('指定したコメントIDは見つかりませんでした (id:' . $commentId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(UpdateCommentAction::class))->__invoke($request, $commentId);
    }
    public function test_存在しないユーザーIDを入力するとエラーを返すこと()
    {
        $commentId = '334c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = UpdateCommentRequest::create('Comment', 'POST', [
            'comment' => [
                'comment.content' =>'書き換え完了',
                'comment.userId'=>'000c1092-7a0d-40b0-af6e-30bff5975e31'
            ]
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(UpdateCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new UpdateCommentAction(
                $mockCommentRepository
            );
        });
        $this->expectExceptionMessage('指定したユーザーIDは見つかりませんでした (id:000c1092-7a0d-40b0-af6e-30bff5975e31');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(UpdateCommentAction::class))->__invoke($request, $commentId);
    }
}
