<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\infrastructures\Care\CareFertilizerRepository;
use App\Packages\infrastructures\Care\CareWaterRepository;
use App\Packages\infrastructures\Shared\TransactionInterface;
use App\Packages\Presentations\Requests\Fertilizer\CreateFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CreateFertilizerSettingAction
{
    /**
     * @var FertilizerRepositoryInterface
     */
    private FertilizerRepositoryInterface $fertilizerSettingRepository;
    private CareFertilizerRepository $careRepository;
    private TransactionInterface $transaction;

    /**
     * @param FertilizerRepositoryInterface $fertilizerSettingRepository
     */
    public function __construct(FertilizerRepositoryInterface $fertilizerSettingRepository,CareFertilizerRepository $careRepository, TransactionInterface $transaction)
    {
        $this->fertilizerSettingRepository = $fertilizerSettingRepository;
        $this->careRepository=$careRepository;
        $this->transaction=$transaction;
    }

    /**
     * @param CreateFertilizerSettingRequest $createFertilizerSettingRequest
     * @return FertilizerSettingWrapDto
     */
    public function __invoke(
        CreateFertilizerSettingRequest $createFertilizerSettingRequest
    ): FertilizerSettingWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $fertilizerSettingMonths = $createFertilizerSettingRequest->getMonths();
        $fertilizerSettingNote = $createFertilizerSettingRequest->getNote();
        $fertilizerSettingAmount = $createFertilizerSettingRequest->getAmount();
        $fertilizerSettingName = $createFertilizerSettingRequest->getName();
        $checkSeatId=$createFertilizerSettingRequest->getCheckSeatId();

        try {
            $this->transaction->begin();
            $fertilizerSetting = new MonthsFertilizerSetting(
                new FertilizerSettingId(),
                $fertilizerSettingMonths,
                new FertilizerNote($fertilizerSettingNote),
                new FertilizerAmount($fertilizerSettingAmount),
                new fertilizerName($fertilizerSettingName),
            );
            $fertilizerSettingCollection = new FertilizerSettingCollection();

            $fertilizerSettingCollection->addSetting($fertilizerSetting);

            $this->fertilizerSettingRepository->save($fertilizerSettingCollection,$checkSeatId);

            $this->careRepository->save($fertilizerSettingCollection);

            $this->transaction->commit();

        } catch (\DomainException $e) {
            $this->transaction->rollback();

            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return FertilizerSettingsDtoFactory::create($fertilizerSetting);
    }
}
