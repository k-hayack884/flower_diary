<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\GetDiaryRequest;
use App\Packages\Usecases\Dto\Diary\DiaryDto;

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
     * @return DiaryDto
     */
    public function __invoke(
        GetDiaryRequest $getDiaryRequest,
        string $diaryId
    ): DiaryDto
    {
        $hitDiary = $this->diaryRepository->findById(new DiaryId($diaryId));


        return DiaryDtoFactory::create($hitDiary);
    }
}
