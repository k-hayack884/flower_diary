<?php

namespace Packages\Usecases\Diary;

use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\Usecases\Diary\UpdateDiaryAction;
use PHPUnit\Framework\TestCase;

class UpdateDiaryActionTest extends TestCase
{
    public function test_指定した水やり設定のレスポンスの型があっていること()
    {
        $diaryId = '333c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = UpdateDiaryRequest::create('diary', 'POST', [
            'diary' => [
                'diary.content' =>'書き換え完了',
            ]
        ]);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);

        app()->bind(UpdateDiaryAction::class, function () use (
            $mockDiaryRepository
        ) {
            return new UpdateDiaryAction(
                $mockDiaryRepository
            );
        });

        $prevDiary = $mockDiaryRepository->findById(new DiaryId($diaryId));
        $result = (app()->make(UpdateDiaryAction::class))->__invoke($request, $diaryId);

        $this->assertSame([5, 7, 9], $result->diary->months);
        $this->assertSame('ち～ん', $result->Diarys->note);
        $this->assertSame(334, $result->Diarys->DiaryAmount);
        $this->assertSame('甲子園の土', $result->Diarys->DiaryName);
        $this->assertNotEquals($prevDiary->getDiaryNote()->getvalue(), $result->Diarys->note);
    }

    public function test_存在しない肥料設定IDを入力するとエラーを返すこと()
    {
        $DiaryId = new Uuid();
        $request = UpdateDiaryRequest::create('Diary/settings/Update', 'POST', [
            'Diary' => [
                'Diary.months' => [5, 7, 9],
                'Diary.note' => 'ち～ん',
                'Diary.amount' => 334,
                'Diary.name' => '甲子園の土',
            ]
        ]);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);

        app()->bind(UpdateDiaryAction::class, function () use (
            $mockDiaryRepository
        ) {
            return new UpdateDiaryAction(
                $mockDiaryRepository
            );
        });
        $this->expectExceptionMessage('指定した肥料設定IDは見つかりませんでした (id:' . $DiaryId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(UpdateDiaryAction::class))->__invoke($request, $DiaryId);
    }
}
