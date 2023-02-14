<?php

namespace Packages\Usecases\Diary;

use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\Presentations\Requests\Diary\CreateDiaryRequest;
use App\Packages\Usecases\Diary\CreateDiaryAction;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;
use PHPUnit\Framework\TestCase;

class CreateDiaryActionTest extends TestCase
{
    public function test_作成した日記のレスポンスの型があっていること()
    {
        $request = CreateDiaryRequest::create('diary', 'POST', [
            'diary'=>[
                'diary.content'=>'めちゃくちゃ成長している',
            ]
        ]);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);

        app()->bind(CreateDiaryAction::class, function () use (
            $mockDiaryRepository
        ) {
            return new CreateDiaryAction(
                $mockDiaryRepository
            );
        });
        $result = (app()->make(CreateDiaryAction::class))->__invoke($request);

        $this->assertInstanceOf(DiaryWrapDto::class, $result);
        $this->assertIsArray($result->diary->comments);
        $this->assertSame('めちゃくちゃ成長している', $result->diary->content);
    }
}
