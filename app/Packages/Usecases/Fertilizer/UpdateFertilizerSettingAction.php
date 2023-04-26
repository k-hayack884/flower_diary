<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\Presentations\Requests\Fertilizer\UpdateFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UpdateFertilizerSettingAction
{
    /**
     * @var FertilizerRepositoryInterface
     */
    private FertilizerRepositoryInterface $fertilizerSettingRepository;

    /**
     * @param FertilizerRepositoryInterface $fertilizerSettingRepository
     */
    public function __construct(FertilizerRepositoryInterface $fertilizerSettingRepository)
    {
        $this->fertilizerSettingRepository = $fertilizerSettingRepository;
    }

    /**
     * @param UpdateFertilizerSettingRequest $updateFertilizerSettingRequest
     * @return FertilizerSettingWrapDto
     */
    public function __invoke(
        UpdatefertilizerSettingRequest $updateFertilizerSettingRequest,
    ): FertilizerSettingWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $fertilizerSettingId=$updateFertilizerSettingRequest->getId();
        $checkSeatId=$updateFertilizerSettingRequest->getCheckSeatId();

        $fertilizerSettingMonths = $updateFertilizerSettingRequest->getMonths();
        $fertilizerSettingNote = $updateFertilizerSettingRequest->getNote();
        $fertilizerSettingAmount = $updateFertilizerSettingRequest->getAmount();
        $fertilizerSettingName = $updateFertilizerSettingRequest->getName();

        $fertilizerSetting = $this->fertilizerSettingRepository->findById(new FertilizerSettingId($fertilizerSettingId));
        $updateNote = $fertilizerSetting->getFertilizerNote()->update($fertilizerSettingNote);
        try {
            $updateFertilizerSetting = new MonthsFertilizerSetting(
                new FertilizerSettingId($fertilizerSettingId),
                $fertilizerSettingMonths,
                $updateNote,
                new FertilizerAmount($fertilizerSettingAmount),
                new fertilizerName($fertilizerSettingName)
            );
            $fertilizerSettingCollection = new FertilizerSettingCollection();
            $fertilizerSettingCollection->addSetting($updateFertilizerSetting);
            $this->fertilizerSettingRepository->save($fertilizerSettingCollection,$checkSeatId);
            Session::flash('successMessage', '編集に成功しました');
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            Session::flash('failMessage', '編集に失敗しました');
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);

        }

        return FertilizerSettingsDtoFactory::create($updateFertilizerSetting);
    }
}
