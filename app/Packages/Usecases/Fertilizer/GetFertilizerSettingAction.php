<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;
use Illuminate\Support\Facades\Log;

class GetFertilizerSettingAction
{
    /**
     * @var FertilizerRepositoryInterface
     */
    private FertilizerRepositoryInterface $fertilizerRepository;
    /**
     * @param FertilizerRepositoryInterface $fertilizerRepository
     */
    public function __construct(FertilizerRepositoryInterface $fertilizerRepository)
    {
        $this->fertilizerRepository = $fertilizerRepository;
    }

    /**
     * @param GetFertilizerSettingRequest $getFertilizerSettingRequest
     * @return FertilizerSettingWrapDto
     */
    public function __invoke(
        GetFertilizerSettingRequest $getFertilizerSettingRequest,
    ): FertilizerSettingWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $fertilizerSettingId=$getFertilizerSettingRequest->getId();
        $fertilizerSetting = $this->fertilizerRepository->findById(new FertilizerSettingId($fertilizerSettingId));

        Log::info(__METHOD__, ['終了']);

        return FertilizerSettingsDtoFactory::create($fertilizerSetting);
    }
}
