<?php

namespace Packages\Usecases\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\Presentations\Requests\Diary\DeleteDiaryRequest;
use App\Packages\Usecases\Diary\DeleteDiaryAction;
use PHPUnit\Framework\TestCase;

class DeleteDiaryActionTest extends TestCase
{
    public function test_指定した日記が削除されていること()
    {
        $request = DeleteDiaryRequest::create('diary', 'DELETE', [
                'diaryId'=>'334c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);

        app()->bind(DeleteDiaryAction::class, function () use (
            $mockDiaryRepository
        ) {
            return new DeleteDiaryAction(
                $mockDiaryRepository
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
        ]);        $mockDiaryRepository = app()->make(MockDiaryRepository::class);

        app()->bind(DeleteDiaryAction::class, function () use (
            $mockDiaryRepository
        ) {
            return new DeleteDiaryAction(
                $mockDiaryRepository
            );
        });
        $this->expectExceptionMessage('指定した日記IDは見つかりませんでした (id:' . $diaryId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteDiaryAction::class))->__invoke($request, $diaryId);
        $Diary = $mockDiaryRepository->findById(new DiaryId($DiaryId));
    }
}
