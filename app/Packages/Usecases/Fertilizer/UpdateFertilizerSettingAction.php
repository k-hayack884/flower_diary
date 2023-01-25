<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingID;
use App\Packages\Domains\Fertilizer\TarmFertilizerSetting;
use App\Packages\Presentations\Requests\Fertilizer\UpdateFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;

class UpdateFertilizerSettingAction
{
    public function __construct(FertilizerRepositoryInterface $fertilizerSettingRepository)
    {
        $this->fertilizerSettingRepository = $fertilizerSettingRepository;
    }

    public function __invoke(
        UpdatefertilizerSettingRequest $updateFertilizerSettingRequest,
        string                    $fertilizerSettingId
    ): FertilizerSettingWrapDto
    {
        $requestArray = [
            'fertilizerSetting.months' => $updateFertilizerSettingRequest->getMonths(),
            'fertilizerSetting.note' => $updateFertilizerSettingRequest->getNote(),
            'fertilizerSetting.amount' => $updateFertilizerSettingRequest->getAmount(),
            'fertilizerSetting.name' => $updateFertilizerSettingRequest->getName(),
        ];

        $fertilizerSetting = $this->fertilizerSettingRepository->findById(new FertilizerSettingID($fertilizerSettingId));

        $updateMonths = $requestArray['fertilizerSetting.months'];
        $updateNote = $fertilizerSetting->getFertilizerNote()->update($requestArray['fertilizerSetting.note']);
        $updateAmount = new FertilizerAmount($requestArray['fertilizerSetting.amount']);
        $updateName = new fertilizerName($requestArray['fertilizerSetting.name']);

        try {
            $updateFertilizerSetting = new TarmFertilizerSetting(
                new FertilizerSettingID($fertilizerSettingId),
                $updateMonths,
                $updateNote,
                $updateAmount,
                $updateName,
            );
            $this->fertilizerSettingRepository->save($updateFertilizerSetting);
        } catch (Exception $e) {
            throw  $e;
        }
        return FertilizerSettingsDtoFactory::create($updateFertilizerSetting);
    }
}
