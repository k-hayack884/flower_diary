<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerAmount;
use App\Packages\Domains\Fertilizer\fertilizerName;
use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;
use App\Packages\Presentations\Requests\Fertilizer\UpdateFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;

class UpdateFertilizerSettingAction
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
     * @param UpdateFertilizerSettingRequest $updateFertilizerSettingRequest
     * @return FertilizerSettingWrapDto
     */
    public function __invoke(
        UpdatefertilizerSettingRequest $updateFertilizerSettingRequest,
    ): FertilizerSettingWrapDto
    {
        $fertilizerSettingId = $updateFertilizerSettingRequest->getId();
        $fertilizerSettingMonths = $updateFertilizerSettingRequest->getMonths();
        $fertilizerSettingNote = $updateFertilizerSettingRequest->getNote();
        $fertilizerSettingAmount = $updateFertilizerSettingRequest->getAmount();
        $fertilizerSettingName = $updateFertilizerSettingRequest->getName();

        $fertilizerSetting = $this->fertilizerSettingRepository->findById(new FertilizerSettingId($fertilizerSettingId));
        $updateNote = $fertilizerSetting->getFertilizerNote()->update($fertilizerSettingNote);

        try {
            $updateFertilizerSetting = new MonthsFertilizerSetting(
                new FertilizerSettingId($fertilizerSettingId),
                $fertilizerSettingMonths,
                $updateNote,
                new FertilizerAmount($fertilizerSettingAmount),
                new fertilizerName($fertilizerSettingName)
            );
            $fertilizerSettingCollection = new FertilizerSettingCollection();
            $this->fertilizerSettingRepository->save($fertilizerSettingCollection);
        } catch (Exception $e) {
            throw  $e;
        }

        return FertilizerSettingsDtoFactory::create($updateFertilizerSetting);
    }
}
