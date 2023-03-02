<?php

namespace Packages\Usecases\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\infrastructures\Shared\MockTransaction;
use App\Packages\infrastructures\Shared\Transaction;
use App\Packages\Presentations\Requests\Diary\DeleteDiaryRequest;
use App\Packages\Usecases\Diary\DeleteDiaryAction;
use Tests\TestCase;
class DeleteDiaryActionTest extends TestCase
{
    public function test_指定した日記が削除されていること()
    {
        $request = DeleteDiaryRequest::create('diary', 'DELETE', [
                'diaryId'=>'333c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);
        $mockCommentRepository = app()->make(MockCommentRepository::class);
        $testTransaction= app()->make(MockTransaction::class);

        app()->bind(DeleteDiaryAction::class, function () use (
            $mockDiaryRepository,
            $mockCommentRepository,
            $testTransaction
        ) {
            return new DeleteDiaryAction(
                $mockDiaryRepository,
                $mockCommentRepository,
                $testTransaction
            );
        });
        $this->expectExceptionMessage('指定した日記IDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteDiaryAction::class))->__invoke($request);
       $diary = $mockDiaryRepository->findById(new DiaryId($request->getId()));
    }

    public function test_存在しない日記IDを入力するとエラーを返すこと()
    {
        $diaryId =new Uuid();
        $request = DeleteDiaryRequest::create('diary', 'DELETE', [
            'diaryId'=>$diaryId
        ]);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);
        $mockCommentRepository = app()->make(MockCommentRepository::class);
        $testTransaction= app()->make(MockTransaction::class);

        app()->bind(DeleteDiaryAction::class, function () use (
            $mockDiaryRepository,
            $mockCommentRepository,
            $testTransaction
        ) {
            return new DeleteDiaryAction(
                $mockDiaryRepository,
                $mockCommentRepository,
                $testTransaction
            );
        });
        $this->expectExceptionMessage('指定した日記IDは見つかりませんでした (id:' . $diaryId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteDiaryAction::class))->__invoke($request, $diaryId);
        $Diary = $mockDiaryRepository->findById(new DiaryId($diaryId));
    }
}
