<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\GetWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use Illuminate\Support\Facades\Log;

class GetWaterSettingAction
{
    /**
     * @var WaterSettingRepositoryInterface
     */
    private WaterSettingRepositoryInterface $waterSettingRepository;
    /**
     * @param WaterSettingRepositoryInterface $waterSettingRepository
     */
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    /**
     * @param GetWaterSettingRequest $getWaterSettingRequest
     * @return WaterSettingWrapDto
     */
    public function __invoke(
        GetWaterSettingRequest $getWaterSettingRequest,
    ): WaterSettingWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $waterSettingId=$getWaterSettingRequest->getId();
        $waterSetting = $this->waterSettingRepository->findById(new WaterSettingId($waterSettingId));

        Log::info(__METHOD__, ['終了']);

        return WaterSettingsDtoFactory::create($waterSetting);
    }
}
