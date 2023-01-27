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

class CreateFertilizerSettingAction
{
    public function __construct(FertilizerRepositoryInterface $fertilizerSettingRepository)
    {
        $this->fertilizerSettingRepository = $fertilizerSettingRepository;
    }

    public function __invoke(
        CreateFertilizerSettingRequest $createFertilizerSettingRequest
    ): FertilizerSettingWrapDto
    {
        $requestArray = [
            'fertilizerSetting.months' => $createFertilizerSettingRequest->getMonths(),
            'fertilizerSetting.note' => $createFertilizerSettingRequest->getNote(),
            'fertilizerSetting.amount' => $createFertilizerSettingRequest->getAmount(),
            'fertilizerSetting.name' => $createFertilizerSettingRequest->getName(),
        ];
        try {
            $fertilizerSettingId = new FertilizerSettingId();
            $fertilizerSettingMonths = $requestArray['fertilizerSetting.months'];
            $fertilizerSettingNote = new FertilizerNote($requestArray['fertilizerSetting.note']);
            $fertilizerSettingAmount = new FertilizerAmount($requestArray['fertilizerSetting.amount']);
            $fertilizerSettingName = new FertilizerName($requestArray['fertilizerSetting.name']);

            $fertilizerSetting = new MonthsFertilizerSetting(
                $fertilizerSettingId,
                $fertilizerSettingMonths,
                $fertilizerSettingNote,
                $fertilizerSettingAmount,
                $fertilizerSettingName,
            );
            $FertilizerSettingCollection=new FertilizerSettingCollection();
            $this->fertilizerSettingRepository->save($FertilizerSettingCollection);
        } catch (Exception $e) {
            throw  $e;
        }
        return FertilizerSettingsDtoFactory::create($fertilizerSetting);
    }
}
