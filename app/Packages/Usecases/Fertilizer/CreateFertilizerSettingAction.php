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
        } catch (Exception $e) {
            throw  $e;
        }
        return FertilizerSettingsDtoFactory::create($fertilizerSetting);
    }
}
