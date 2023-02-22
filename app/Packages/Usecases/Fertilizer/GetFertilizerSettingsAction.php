<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingDto;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingsWrapDto;

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
     * @param GetFertilizerSettingRequest $getFertilizerSettingRequest
     * @return FertilizerSettingsWrapDto
     */
    public function __invoke(GetFertilizerSettingRequest $getFertilizerSettingRequest
    ): FertilizerSettingsWrapDto
    {
        $fertilizerSettingCollection = $this->fertilizerSettingRepository->find();
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
        return new FertilizerSettingsWrapDto($fertilizerSettingDtos);
    }
}
