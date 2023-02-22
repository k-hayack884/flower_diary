<?php

namespace Packages\Usecases\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Shared\Uuid;
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
        $request = GetDiaryRequest::create('diary', 'GET', [
            'diaryId'=>'333c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockDiarySettingRepository = app()->make(MockDiaryRepository::class);

        app()->bind(GetDiaryAction::class, function () use (
            $mockDiarySettingRepository
        ) {
            return new GetDiaryAction(
                $mockDiarySettingRepository
            );
        });
        $result = (app()->make(GetDiaryAction::class))->__invoke($request);

        $this->assertInstanceOf(DiaryWrapDto::class, $result);
        $this->assertSame('333c1092-7a0d-40b0-af6e-30bff5975e31', $result->diary->diaryId);
        $this->assertIsArray($result->diary->comments);
        $this->assertSame('ほげえ', $result->diary->content);
    }

    public function test_存在しないIDの場合エラーを出すこと()
    {
        $diaryId =new Uuid();
        $request = GetDiaryRequest::create('diary', 'GET', [
            'diaryId'=>$diaryId
        ]);        $mockDiarySettingRepository = app()->make(MockDiaryRepository::class);

        app()->bind(GetDiaryAction::class, function () use (
            $mockDiarySettingRepository
        ) {
            return new GetDiaryAction(
                $mockDiarySettingRepository
            );
        });
        $this->expectExceptionMessage('指定した日記IDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(GetDiaryAction::class))->__invoke($request, $request->getId());

    }
}
