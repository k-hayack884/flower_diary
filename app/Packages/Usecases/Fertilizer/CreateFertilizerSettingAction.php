<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerNote;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\Presentations\Requests\Fertilizer\CreateFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;
use Illuminate\Support\Facades\Log;

class CreateFertilizerSettingAction
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

        try {
            $fertilizerSetting = new MonthsFertilizerSetting(
                new FertilizerSettingId(),
                $fertilizerSettingMonths,
                new FertilizerNote($fertilizerSettingNote),
                new FertilizerAmount($fertilizerSettingAmount),
                new fertilizerName($fertilizerSettingName),
            );
            $FertilizerSettingCollection = new FertilizerSettingCollection();
            $this->fertilizerSettingRepository->save($FertilizerSettingCollection);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return FertilizerSettingsDtoFactory::create($fertilizerSetting);
    }
}
