<?php

namespace App\Packages\Usecases\Plant;

use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Packages\Usecases\Dto\Plant\PlantWrapDto;

class ScanPlantAction
{
    private PlantRepositoryInterface $plantRepository;

    public function __construct(PlantRepositoryInterface $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    public function __invoke(
        string $plantLabel,
    ): PlantWrapDto
    {
        $hitPlant = $this->plantRepository->findByName($plantLabel);
        return PlantDtoFactory::create($hitPlant);
    }
}