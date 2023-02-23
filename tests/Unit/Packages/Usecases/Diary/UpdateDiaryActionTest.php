<?php

namespace Packages\Usecases\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\Presentations\Requests\Diary\UpdateDiaryRequest;
use App\Packages\Usecases\Diary\UpdateDiaryAction;
use PHPUnit\Framework\TestCase;

class UpdateDiaryActionTest extends TestCase
{
    public function test_変更をした日記のレスポンスの型があっていること()
    {

        $request = UpdateDiaryRequest::create('diary', 'POST', [
            'diaryId'=>'333c1092-7a0d-40b0-af6e-30bff5975e31',
                'diaryContent' =>'書き換え完了',
        ]);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);

        app()->bind(UpdateDiaryAction::class, function () use (
            $mockDiaryRepository
        ) {
            return new UpdateDiaryAction(
                $mockDiaryRepository
            );
        });

        $prevDiary = $mockDiaryRepository->findById(new DiaryId($request->getId()));
        $result = (app()->make(UpdateDiaryAction::class))->__invoke($request);

        $this->assertSame('書き換え完了', $result->diary->content);
        $this->assertNotEquals($prevDiary->getDiaryContent()->getvalue(), $result->diary->content);
    }

    public function test_存在しない日記IDを入力するとエラーを返すこと()
    {
        $diaryId = new Uuid();
        $request = UpdateDiaryRequest::create('diary', 'POST', [
            'diaryId'=>$diaryId,
            'diaryContent' =>'書き換え完了',
        ]);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);

        app()->bind(UpdateDiaryAction::class, function () use (
            $mockDiaryRepository
        ) {
            return new UpdateDiaryAction(
                $mockDiaryRepository
            );
        });
        $this->expectExceptionMessage('指定した日記IDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(UpdateDiaryAction::class))->__invoke($request, $request->getId());
    }
}
