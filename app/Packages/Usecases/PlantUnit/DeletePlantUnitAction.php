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
use App\Packages\infrastructures\Shared\TransactionInterface;
use App\Packages\Presentations\Requests\PlantUnit\DeletePlantUnitRequest;
use Exception;

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
        $requestId = $deletePlantUnitRequest->getId();

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

            foreach ($checkSeat["water_ids"] as $waterSettingId) {
                $this->waterSettingRepository->delete(new WaterSettingId($waterSettingId));
            }
            foreach ($checkSeat["fertilizer_ids"] as $fertilizerSettingId) {
                $this->fertilizerSettingRepository->delete(new FertilizerSettingId($fertilizerSettingId));
            }
            $this->checkSeatRepository->delete(new CheckSeatId($checkSeat["check_seat_id"]));

            //植物ユニットの削除
            $this->plantUnitRepository->delete($hitPlantUnit->getPlantUnitId());

            $this->transaction->commit();
        } catch (\DomainException $e) {
            $this->transaction->rollback();
            abort(400,$e);
        }
    }
}
