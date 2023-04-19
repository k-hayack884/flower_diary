<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Http\Services\Base64Service;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitsRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitDto;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitsWrapDto;
use Illuminate\Support\Facades\Log;

class GetPlantUnitsAction
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
     * @param GetPlantUnitsRequest $getPlantUnitsRequest
     * @return PlantUnitsWrapDto
     */
    public function __invoke(GetPlantUnitsRequest $getPlantUnitsRequest
    ): PlantUnitsWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $plantUnits = $this->plantUnitRepository->find();
        $plantUnitCollection=new PlantUnitCollection($plantUnits);


        $plantUnitDtos = [];

        foreach ($plantUnitCollection->toArray() as $plantUnit) {
            $plantImageData= $plantUnit->getPlantImage()->getValue();
            $plantImage=Base64Service::base64FileEncode($plantImageData,'plantUnitImage');
            $plantUnitDtos[] =
                new PlantUnitDto(
                    $plantUnit->getPlantUnitId()->getId(),
                    $plantUnit->getPlantId()->getId(),
                    $plantUnit->getUserId()->getId(),
                    $plantUnit->getCheckSeatId()->getId(),
                    $plantUnit->getPlantName()->getValue(),
                    $plantImage,
                    $plantUnit->getDiaries(),
                    $plantUnit->getCreateDate()->format('Y/m/d'),
                    $plantUnit->getUpdateDate()->format('Y/m/d'),
                );
        }
        Log::info(__METHOD__, ['終了']);

        return new PlantUnitsWrapDto($plantUnitDtos);
    }
}
