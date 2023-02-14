<?php

namespace Packages\Usecases\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\Presentations\Requests\Diary\GetDiaryRequest;
use App\Packages\Usecases\Diary\GetDiaryAction;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;
use PHPUnit\Framework\TestCase;

class GetDiaryActionTest extends TestCase
{
    public function test_日記詳細のレスポンスの型があっていること()
    {
        $dairyId = '333c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = GetDiaryRequest::create('diary', 'GET', []);
        $mockDiarySettingRepository = app()->make(MockDiaryRepository::class);

        app()->bind(GetDiaryAction::class, function () use (
            $mockDiarySettingRepository
        ) {
            return new GetDiaryAction(
                $mockDiarySettingRepository
            );
        });
        $result = (app()->make(GetDiaryAction::class))->__invoke($request, $dairyId);

        $this->assertInstanceOf(DiaryWrapDto::class, $result);
        $this->assertSame('333c1092-7a0d-40b0-af6e-30bff5975e31', $result->diary->diaryId);
        $this->assertIsArray($result->diary->comments);
        $this->assertSame('ほげえ', $result->diary->content);
    }

    public function test_存在しないIDの場合エラーを出すこと()
    {
        $diaryId = '334c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = GetDiaryRequest::create('diary', 'GET', []);
        $mockDiarySettingRepository = app()->make(MockDiaryRepository::class);

        app()->bind(GetDiaryAction::class, function () use (
            $mockDiarySettingRepository
        ) {
            return new GetDiaryAction(
                $mockDiarySettingRepository
            );
        });
        $this->expectExceptionMessage('指定した日記IDが見つかりませんでした (id:' . $diaryId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(GetDiaryAction::class))->__invoke($request, $diaryId);

    }
}
