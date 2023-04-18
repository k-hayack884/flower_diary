<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingsRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingDto;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingsWrapDto;
use Illuminate\Support\Facades\Log;

class GetFertilizerSettingsAction
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
     * @param GetFertilizerSettingsRequest $getFertilizerSettingRequest
     * @return FertilizerSettingsWrapDto
     */
    public function __invoke(GetFertilizerSettingsRequest $getFertilizerSettingRequest
    ): FertilizerSettingsWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $checkSeatId=new CheckSeatId($getFertilizerSettingRequest->getCheckSeatId());
        $fertilizerSettingCollection = $this->fertilizerSettingRepository->findByCheckSeatId($checkSeatId);
        $fertilizerSettingDtos = [];

        foreach ($fertilizerSettingCollection as $fertilizerSetting) {
            $fertilizerSettingDtos[] = new FertilizerSettingDto(
                $fertilizerSetting->getFertilizerSettingId()->getId(),
                $fertilizerSetting->getMonths(),
                $fertilizerSetting->getFertilizerNote()->getvalue(),
                $fertilizerSetting->getFertilizerAmount()->getValue(),
                $fertilizerSetting->getFertilizerName()->getValue(),
            );
        }
        Log::info(__METHOD__, ['終了']);

        return new FertilizerSettingsWrapDto($fertilizerSettingDtos);
    }
}
