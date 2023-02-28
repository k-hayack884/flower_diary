<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\GetDiaryRequest;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;
use Illuminate\Support\Facades\Log;

class GetDiaryAction
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
        $this->diaryRepository = $diaryRepository;
    }

    /**
     * @param GetDiaryRequest $getDiaryRequest
     * @return DiaryWrapDto
     */
    public function __invoke(
        GetDiaryRequest $getDiaryRequest,
    ): DiaryWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $diaryId=$getDiaryRequest->getId();
        $hitDiary = $this->diaryRepository->findById(new DiaryId($diaryId));

        Log::info(__METHOD__, ['終了']);
        return DiaryDtoFactory::create($hitDiary);
    }
}
