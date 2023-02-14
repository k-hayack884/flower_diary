<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\GetDiariesRequest;
use App\Packages\Usecases\Dto\Diary\DiariesWrapDto;
use App\Packages\Usecases\Dto\Diary\DiaryDto;

class GetDiariesAction
{
    private DiaryRepositoryInterface $diaryRepository;

    /**
     * @param DiaryRepositoryInterface $diaryRepository
     */
    public function __construct(DiaryRepositoryInterface $diaryRepository)
    {
        $this->DiaryRepository = $diaryRepository;
    }

    /**
     * @param GetDiariesRequest $getDiaryRequest
     * @return DiariesWrapDto
     */
    public function __invoke(GetDiariesRequest $getDiaryRequest
    ): DiariesWrapDto
    {
        $diaryCollection = $this->DiaryRepository->find();
        $diaryDtos = [];

        foreach ($diaryCollection as $diary) {
            $diaryDtos[] =
                new DiaryDto(
                    $diary->getDiaryId()->getId(),
                    $diary->getDiaryContent()->getValue(),
                    $diary->getcomments(),
                    $diary->getCreateDate()->format('Y/m/d'),
            );

        }
        return new DiariesWrapDto($diaryDtos);
    }
}
