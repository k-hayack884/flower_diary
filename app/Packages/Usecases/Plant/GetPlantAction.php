<?php

namespace App\Packages\Usecases\Plant;

use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Packages\Presentations\Requests\Plant\GetPlantRequest;
use App\Packages\Usecases\Dto\Plant\PlantWrapDto;

class GetPlantAction
{
    private PlantRepositoryInterface $plantRepository;

    public function __construct(PlantRepositoryInterface $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    public function __invoke(
        GetPlantRequest $getPlantRequest,
    ): PlantWrapDto
    {
        $plantId=new PlantId($getPlantRequest->getId());
        $hitPlant = $this->plantRepository->findById($plantId);
        $hitPlantImage = $this->plantRepository->findImage($plantId);
        return PlantDtoFactory::create($hitPlant,$hitPlantImage);
    }
}
