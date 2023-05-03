<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\infrastructures\Shared\TransactionInterface;
use App\Packages\Presentations\Requests\Diary\DeleteDiaryRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
        Log::info(__METHOD__, ['開始']);
        $diaryId = new DiaryId($deleteDiaryRequest->getId());



        try {
            $this->transaction->begin();

            $diary = $this->diaryRepository->findById($diaryId);

            foreach ($diary->getComments() as $commentId){
                $this->commentRepository->delete(new CommentId($commentId));
            }
            $this->diaryRepository->delete($diary->getDiaryId());
            $this->transaction->commit();
            Session::flash('successMessage', '削除に成功しました');
        } catch (\DomainException $e) {
            $this->transaction->rollback();
            Session::flash('failMessage', '削除に失敗しました');
            Log::error(__METHOD__, ['エラー']);

            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }
    }
}
