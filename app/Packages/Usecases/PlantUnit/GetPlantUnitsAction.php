<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitsRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitDto;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitsWrapDto;

class GetPlantUnitsAction
{
    private PlantUnitRepositoryInterface $plantUnitRepository;

    /**
     * @param PlantUnitRepositoryInterface $plantUnitRepository
     */
    public function __construct(PlantUnitRepositoryInterface $plantUnitRepository)
    {
        $this->plantUnitRepository = $plantUnitRepository;
    }

    /**
     * @param GetPlantUnitsRequest $getPlantUnitsRequest
     * @return PlantUnitsWrapDto
     */
    public function __invoke(GetPlantUnitsRequest $getPlantUnitsRequest
    ): PlantUnitsWrapDto
    {
        $plantUnitCollection = $this->plantUnitRepository->find();
        $plantUnitDtos = [];

        foreach ($plantUnitCollection as $plantUnit) {
            $plantUnitDtos[] =
                new PlantUnitDto(
                    $plantUnit->getPlantUnitId()->getId(),
                    $plantUnit->getUserId()->getId(),
                    $plantUnit->getPlantId()->getId(),
                    $plantUnit->getCheckSeatId()->getId(),
                    $plantUnit->getPlantName()->getValue(),
                    $plantUnit->getDiaries(),
                    $plantUnit->getCreateDate()->format('Y/m/d'),
                    $plantUnit->getUpdateDate()->format('Y/m/d'),
                );

        }
        return new PlantUnitsWrapDto($plantUnitDtos);
    }
}
