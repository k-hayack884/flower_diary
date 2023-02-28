<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\infrastructures\Shared\TransactionInterface;
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
    public function __construct(
        DiaryRepositoryInterface $diaryRepository,
        CommentRepositoryInterface $commentRepository,
        TransactionInterface     $transaction)
    {
        $this->diaryRepository = $diaryRepository;
        $this->commentRepository=$commentRepository;
        $this->transaction = $transaction;
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
        $diaryId = new DiaryId($deleteDiaryRequest->getId());

        try {
            $this->transaction->begin();
            $diary = $this->diaryRepository->findById($diaryId);

            foreach ($diary->getComments() as $commentId){
                $this->commentRepository->delete(new CommentId($commentId));
            }
            $this->diaryRepository->delete($diary->getDiaryId());
        } catch (Exception $e) {
            throw  $e;
            $this->transaction->rollback();
        }
    }
}
