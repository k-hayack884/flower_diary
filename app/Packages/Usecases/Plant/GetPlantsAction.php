<?php

namespace App\Packages\Usecases\Plant;

use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Packages\Presentations\Requests\Plant\GetPlantsRequest;

class GetPlantsAction
{
    private PlantRepositoryInterface $plantRepository;

    public function __construct(PlantRepositoryInterface $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    public function __invoke(
        GetPlantsRequest $getPlantsRequest,
    )
    {
        $plants= $this->plantRepository->allImage();

        foreach ($plants as $plant){
            echo "['plant_id' =>'".$plant->plant_id."',
            'plant_images' =>'".$plant->plant_images."'],".PHP_EOL;
        }
    }
}
