<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\DeleteDiaryRequest;
use Exception;

class DeleteDiaryAction
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
     * @param DeleteDiaryRequest $deleteDiaryRequest
     * @return void
     * @throws Exception
     */
    public function __invoke(
        DeleteDiaryRequest $deleteDiaryRequest,
    ): void
    {
        $diaryId=new DiaryId($deleteDiaryRequest->getId());

        try {
            $diary=$this->diaryRepository->findById($diaryId);
            $this->diaryRepository->delete($diary->getDiaryId());
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
