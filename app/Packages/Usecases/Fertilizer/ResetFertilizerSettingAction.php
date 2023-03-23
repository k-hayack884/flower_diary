<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\Presentations\Requests\Fertilizer\ResetFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;
use Illuminate\Support\Facades\Log;

class ResetFertilizerSettingAction
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
     * @param ResetFertilizerSettingRequest $resetFertilizerSettingRequest
     * @return FertilizerSettingWrapDto
     */

    public function __invoke(
        ResetfertilizerSettingRequest $resetFertilizerSettingRequest,
    ): FertilizerSettingWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $fertilizerSettingId=$resetFertilizerSettingRequest->getId();
        $checkSeatId=$resetFertilizerSettingRequest->getCheckSeatId();

        $fertilizerSetting = $this->fertilizerSettingRepository->findById(new FertilizerSettingId($fertilizerSettingId));
        $resetMonths = MonthsfertilizerSetting::RESET;
        $resetNote = $fertilizerSetting->getFertilizerNote()->update();
        $resetAmount = new FertilizerAmount(FertilizerAmount::RESET);
        $resetFertilizerName = $fertilizerSetting->getFertilizerName()->update();

        try {
            $resetFertilizerSetting =
                new MonthsFertilizerSetting(
                    new FertilizerSettingId($fertilizerSettingId),
                    $resetMonths,
                    $resetNote,
                    $resetAmount,
                    $resetFertilizerName,
                );
            $fertilizerSettingCollection = new FertilizerSettingCollection();
            $fertilizerSettingCollection->addSetting($resetFertilizerSetting);
            $this->fertilizerSettingRepository->save($fertilizerSettingCollection,$checkSeatId);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }
        return FertilizerSettingsDtoFactory::create($resetFertilizerSetting);
    }
}
