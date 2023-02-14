<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Presentations\Requests\Diary\DeleteDiaryRequest;
use Exception;

class DeleteDiaryAction
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
     * @param DeleteDiaryRequest $deleteDiaryRequest
     * @param string $diaryIdValue
     * @return void
     * @throws Exception
     */

    public function __invoke(
        DeleteDiaryRequest $deleteDiaryRequest,
        string                    $diaryIdValue
    ): void
    {
        try {
            $diaryId = new DiaryId($diaryIdValue);
            $this->diaryRepository->delete($diaryId);
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
