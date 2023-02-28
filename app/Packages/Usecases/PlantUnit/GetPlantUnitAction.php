<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitDto;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;

class GetPlantUnitAction
{
    /**
     * @var PlantUnitRepositoryInterface
     */
    private PlantUnitRepositoryInterface $plantUnitRepository;

    /**
     * @param PlantUnitRepositoryInterface $plantUnitRepository
     */
    public function __construct(PlantUnitRepositoryInterface $plantUnitRepository)
    {
        $this->plantUnitRepository = $plantUnitRepository;
    }

    /**
     * @param GetPlantUnitRequest $getPlantUnitRequest
     * @return PlantUnitWrapDto
     */
    public function __invoke(
        GetPlantUnitRequest $getPlantUnitRequest,
    ): PlantUnitWrapDto
    {
        $plantUnitId=$getPlantUnitRequest->getId();
        $hitPlantUnit= $this->plantUnitRepository->findById(new PlantUnitId($plantUnitId));


        return PlantUnitDtoFactory::create($hitPlantUnit);
    }
}
