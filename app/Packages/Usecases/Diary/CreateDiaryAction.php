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
     * @param CreateDiaryRequest $createDiaryRequest
     * @return DiaryWrapDto
     * @throws Exception
     */
    public function __invoke(
        CreateDiaryRequest $createDiaryRequest
    ): DiaryWrapDto
    {
        $diaryContent = $createDiaryRequest->getDiaryContent();

        try {
            $diaryId = new DiaryId();
            $diaryContent = new DiaryContent($diaryContent);
            $diary = new Diary(
                $diaryId,
                $diaryContent
            );
            $diaryCollection = new DiaryCollection();
            $this->diaryRepository->save($diaryCollection);
        } catch (Exception $e) {
            throw  $e;
        }

        return DiaryDtoFactory::create($diary);
    }
}
