<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\CreateDiaryRequest;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;
use Exception;

class CreateDiaryAction
{
    public function __construct(DiaryRepositoryInterface $diaryRepository)
    {
        $this->diaryRepository = $diaryRepository;
    }

    public function __invoke(
        CreateDiaryRequest $createDiaryRequest
    ): DiaryWrapDto
    {
        $requestArray = [
            'diary.content' => $createDiaryRequest->getDiaryContent()
        ];
        try {
            $diaryId = new DiaryId();
            $diaryMonths = new DiaryContent($requestArray['diary.content']);
            $diary = new Diary(
                $diaryId,
                $diaryMonths
            );
            $diaryCollection = new DiaryCollection();
            $this->diaryRepository->save($diaryCollection);
        } catch (Exception $e) {
            throw  $e;
        }
        return DiaryDtoFactory::create($diary);
    }
}
