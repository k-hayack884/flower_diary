<?php

namespace Packages\Usecases\Comment;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\Presentations\Requests\Comment\DeleteCommentRequest;
use App\Packages\Usecases\Comment\DeleteCommentAction;
use PHPUnit\Framework\TestCase;

class DeleteCommentActionTest extends TestCase
{
    public function test_指定したコメントが削除されていること()
    {
        $request = DeleteCommentRequest::create('comment', 'DELETE', [
            'commentId'=> '666c1092-7a0d-40b0-af6e-30bff5975e31',
            'commentUserId'=>'222c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(DeleteCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new DeleteCommentAction(
                $mockCommentRepository
            );
        });
        $this->expectExceptionMessage('指定したコメントIDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteCommentAction::class))->__invoke($request);
        $Comment = $mockCommentRepository->findByCommentId(new CommentId($request->getId()));
    }

    public function test_存在しないコメントIDを入力するとエラーを返すこと()
    {
        $commentId =new Uuid();
        $request = DeleteCommentRequest::create('comment', 'DELETE', [
            'commentId'=> $commentId,
             'commentUserId'=>'222c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(DeleteCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new DeleteCommentAction(
                $mockCommentRepository
            );
        });
        $this->expectExceptionMessage('指定したコメントIDは見つかりませんでした (id:' . $commentId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteCommentAction::class))->__invoke($request);
        $comment = $mockCommentRepository->findById(new CommentId($commentId));
    }
    public function test_存在しないユーザーIDを入力するとエラーを返すこと()
    {
        $request = DeleteCommentRequest::create('comment', 'POST', [
            'commentId'=>  '666c1092-7a0d-40b0-af6e-30bff5975e31',
            'commentUserId'=>'334c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockCommentRepository = app()->make(MockCommentRepository::class);

        app()->bind(DeleteCommentAction::class, function () use (
            $mockCommentRepository
        ) {
            return new DeleteCommentAction(
                $mockCommentRepository
            );
        });
        $this->expectExceptionMessage('指定したユーザーIDは見つかりませんでした (id:334c1092-7a0d-40b0-af6e-30bff5975e31');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteCommentAction::class))->__invoke($request);
    }
}
