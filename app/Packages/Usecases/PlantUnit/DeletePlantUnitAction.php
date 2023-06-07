<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\CheckSeat\CheckSeatRepositoryInterface;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\Comment\CommentRepositoryInterface;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Diary\DiaryRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Infrastructures\Shared\TransactionInterface;
use App\Packages\Presentations\Requests\PlantUnit\DeletePlantUnitRequest;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class DeletePlantUnitAction
{
    /**
     * @var PlantUnitRepositoryInterface
     */
    private PlantUnitRepositoryInterface $plantUnitRepository;
    private DiaryRepositoryInterface $diaryRepository;
    private CommentRepositoryInterface $commentRepository;
    private CheckSeatRepositoryInterface $checkSeatRepository;
    private WaterSettingRepositoryInterface $waterSettingRepository;
    private FertilizerRepositoryInterface $fertilizerSettingRepository;
    private TransactionInterface $transaction;

    /**
     * @param PlantUnitRepositoryInterface $plantUnitRepository
     * @param DiaryRepositoryInterface $diaryRepository
     * @param CommentRepositoryInterface $commentRepository
     * @param CheckSeatRepositoryInterface $checkSeatRepository
     * @param WaterSettingRepositoryInterface $waterSettingRepository
     * @param FertilizerRepositoryInterface $fertilizerSettingRepository
     * @param TransactionInterface $transaction
     */
    public function __construct(
        PlantUnitRepositoryInterface    $plantUnitRepository,
        DiaryRepositoryInterface        $diaryRepository,
        CommentRepositoryInterface      $commentRepository,
        CheckSeatRepositoryInterface    $checkSeatRepository,
        WaterSettingRepositoryInterface $waterSettingRepository,
        FertilizerRepositoryInterface   $fertilizerSettingRepository,
        TransactionInterface            $transaction)
    {
        $this->plantUnitRepository = $plantUnitRepository;
        $this->diaryRepository = $diaryRepository;
        $this->commentRepository = $commentRepository;
        $this->checkSeatRepository = $checkSeatRepository;
        $this->waterSettingRepository = $waterSettingRepository;
        $this->fertilizerSettingRepository = $fertilizerSettingRepository;
        $this->transaction = $transaction;
    }

    /**
     * @param DeletePlantUnitRequest $deletePlantUnitRequest
     * @return void
     * @throws Exception
     */

    public function __invoke(
        DeletePlantUnitRequest $deletePlantUnitRequest
    ): void
    {
        Log::info(__METHOD__, ['開始']);

        $requestId = $deletePlantUnitRequest->getId();
        $diaries=[];
        try {
            $this->transaction->begin();
            $hitPlantUnit = $this->plantUnitRepository->findById(new PlantUnitId($requestId));

            //日記とコメントの削除
            foreach ($hitPlantUnit->getDiaries() as $diaryId) {
                $diaries[] = $this->diaryRepository->findById(new DiaryId($diaryId));
            }
            foreach ($diaries as $diary) {
                $comments = $diary->getComments();
                foreach ($comments as $commentId) {
                    $this->commentRepository->delete(new commentId($commentId));
                }
                $this->diaryRepository->delete($diary->getDiaryId());
            }
            //チェックシートの削除
            $checkSeat = $this->checkSeatRepository->findById($hitPlantUnit->getCheckSeatId());

            foreach ($checkSeat->getWaterSettingIds() as $waterSettingId) {
                $this->waterSettingRepository->delete(new WaterSettingId($waterSettingId));
            }
            foreach ($checkSeat->getFertilizerSettingIds() as $fertilizerSettingId) {
                $this->fertilizerSettingRepository->delete(new FertilizerSettingId($fertilizerSettingId));
            }
            $this->checkSeatRepository->delete(new CheckSeatId($checkSeat->getCheckSeatId()->getId()));

            //植物ユニットの削除
            $this->plantUnitRepository->delete($hitPlantUnit->getPlantUnitId());

            $this->transaction->commit();
            Session::flash('successMessage', '削除に成功しました');

        } catch (\DomainException $e) {
            $this->transaction->rollback();
            Log::error(__METHOD__, ['エラー']);
            Session::flash('failMessage', '削除に失敗しました');

            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }
    }
}
