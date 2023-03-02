<?php

namespace Packages\Usecases\Diary;

use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\Presentations\Requests\Diary\GetDiariesRequest;
use App\Packages\Presentations\Requests\Diary\GetDiaryRequest;
use App\Packages\Usecases\Diary\GetDiariesAction;
use App\Packages\Usecases\Diary\GetDiaryAction;
use App\Packages\Usecases\Dto\Diary\DiariesWrapDto;
use Tests\TestCase;
class GetDairiesActionTest extends TestCase
{
    public function test_日記のレスポンスの型があっていること()
    {
        $request = GetDiariesRequest::create('diary', 'GET', []);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);

        app()->bind(GetDiariesAction::class, function () use (
            $mockDiaryRepository
        ) {
            return new GetDiariesAction(
                $mockDiaryRepository
            );
        });
        $result = (app()->make(GetDiariesAction::class))->__invoke($request);

        $this->assertInstanceOf(DiariesWrapDto::class, $result);
    }
}
