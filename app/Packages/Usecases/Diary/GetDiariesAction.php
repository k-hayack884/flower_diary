<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\GetDiariesRequest;
use App\Packages\Usecases\Dto\Diary\DiariesWrapDto;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use Illuminate\Support\Facades\Log;

class GetDiariesAction
{
    /**
     * @var DiaryRepositoryInterface
     */
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
        Log::info(__METHOD__, ['開始']);

        $diaries= $this->DiaryRepository->find();
        $diaryCollection=new DiaryCollection($diaries);

        $diaryDtos = [];

        foreach ($diaryCollection->toArray() as $diary) {
            $diaryDtos[] =
                new DiaryDto(
                    $diary->getDiaryId()->getId(),
                    $diary->getDiaryContent()->getValue(),
                    $diary->getDiaryImage()->getValue(),
                    $diary->getcomments(),
                    $diary->getCreateDate()->format('Y/m/d'),
            );
        }
        Log::info(__METHOD__, ['終了']);

        return new DiariesWrapDto($diaryDtos);
    }
}
