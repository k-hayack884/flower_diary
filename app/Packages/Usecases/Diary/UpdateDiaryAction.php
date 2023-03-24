<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\Diary;
use App\Packages\Domains\Diary\DiaryCollection;
use App\Packages\Domains\Diary\DiaryContent;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\UpdateDiaryRequest;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;
use Illuminate\Support\Facades\Log;

class UpdateDiaryAction
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
     * @param UpdateDiaryRequest $updateDiaryRequest
     * @return DiaryWrapDto
     */
    public function __invoke(
        UpdateDiaryRequest $updateDiaryRequest,
    ): DiaryWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $diaryId = $updateDiaryRequest->getId();
        $plantUnitId=$updateDiaryRequest->getPlantUnitId();

        $diary = $this->diaryRepository->findById(new DiaryId($diaryId));
        $updateContent = $diary->getDiaryContent()->update($updateDiaryRequest->getDiaryContent());

        try {
            $updateDiary = new Diary(
                $diary->getDiaryId(),
                $updateContent,
                $diary->getComments(),
                $diary->getCreateDate()
            );
            $diaryCollection = new DiaryCollection();
            $diaryCollection->addDiary($updateDiary);
            $this->diaryRepository->save($diaryCollection,$plantUnitId);
        } catch (\DomainException $e) {
           abort(400,$e);
            Log::error(__METHOD__, ['開始']);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return DiaryDtoFactory::create($updateDiary);
    }
}
