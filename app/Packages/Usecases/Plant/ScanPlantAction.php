<?php

namespace App\Packages\Usecases\Plant;

use App\Packages\Domains\Plant\PlantRepositoryInterface;
use Illuminate\Support\Facades\Request;

class ScanPlantAction
{
    private PlantRepositoryInterface $plantRepository;

    public function __construct(PlantRepositoryInterface $plantRepository)
    {
        $this->plantRepository = $plantRepository;
    }

    public function __invoke(
       string $plantLabel,
    ){
$plant=$this->plantRepository->findByName($plantLabel);
        return response()->json([
            'message' => $plant
        ]);
    }
}
