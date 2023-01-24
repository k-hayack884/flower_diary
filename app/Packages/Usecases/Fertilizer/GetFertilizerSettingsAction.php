<?php

namespace App\Packages\Usecases\Fertilizer;

class GetFertilizerSettingsAction
{
    private FertilizerSettingRepositoryInterface $FertilizerSettingRepository;

    /**
     * @param FertilizerSettingRepositoryInterface $FertilizerSettingRepository
     */
    public function __construct(FertilizerSettingRepositoryInterface $FertilizerSettingRepository)
    {
        $this->FertilizerSettingRepository = $FertilizerSettingRepository;
    }

    /**
     * @param GetFertilizerSettingRequest $getFertilizerSettingRequest
     * @return FertilizerSettingsWrapDto
     */
    public function __invoke(GetFertilizerSettingRequest $getFertilizerSettingRequest
    ): FertilizerSettingsWrapDto
    {
        $FertilizerSettingCollection = $this->FertilizerSettingRepository->find();
        $FertilizerSettingDtos = [];

        foreach ($FertilizerSettingCollection as $FertilizerSetting) {
            $FertilizerSettingDtos[] = new FertilizerSettingDto(
                $FertilizerSetting->getFertilizerSettingId(),
                $FertilizerSetting->getMonths(),
                $FertilizerSetting->getWaterAmount()->getValue(),
                $FertilizerSetting->getWaterNote()->getNote(),
                $FertilizerSetting->getWateringTimes()->getValue(),
                $FertilizerSetting->getWateringInterval()->getValue(),
                $FertilizerSetting->getAlertTimes()
            );
        }
        return new FertilizerSettingsWrapDto($FertilizerSettingDtos);
    }
}
