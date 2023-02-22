<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\GetDiaryRequest;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;

class GetDiaryAction
{
    private DiaryRepositoryInterface $diaryRepository;
    /**
     * @param DiaryRepositoryInterface $diaryRepository
     */
    public function __construct(DiaryRepositoryInterface $diaryRepository)
    {
        $this->diaryRepository = $diaryRepository;
    }

    /**
     * @param GetDiaryRequest $getDiaryRequest
     * @param string $diaryId
     * @return DiaryWrapDto
     */
    public function __invoke(
        GetDiaryRequest $getDiaryRequest,
    ): DiaryWrapDto
    {
        $diaryId=$getDiaryRequest->getId();
        $hitDiary = $this->diaryRepository->findById(new DiaryId($diaryId));

        return DiaryDtoFactory::create($hitDiary);
    }
}
