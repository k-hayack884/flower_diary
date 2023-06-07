<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Http\Services\Base64Service;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Infrastructures\Plant\PlantRepository;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitsRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitDetailDto;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitsWrapDto;
use Illuminate\Support\Facades\Log;

class GetPlantUnitsAction
{
    /**
     * @var PlantUnitRepositoryInterface
     */
    private PlantUnitRepositoryInterface $plantUnitRepository;
    private PlantRepository $plantRepository;

    /**
     * @param PlantUnitRepositoryInterface $plantUnitRepository
     * @param PlantRepository $plantRepository
     */
    public function __construct(PlantUnitRepositoryInterface $plantUnitRepository,
                                PlantRepository              $plantRepository)
    {
        $this->plantUnitRepository = $plantUnitRepository;
        $this->plantRepository = $plantRepository;
    }

    /**
     * @param GetPlantUnitsRequest $getPlantUnitsRequest
     * @return PlantUnitsWrapDto
     */
    public function __invoke(GetPlantUnitsRequest $getPlantUnitsRequest
    ): PlantUnitsWrapDto
    {
        Log::info(__METHOD__, ['開始']);
        $userId = new UserId($getPlantUnitsRequest->getUserId());
        $plantUnits = $this->plantUnitRepository->findByUserId($userId);

        $plantUnitCollection = new PlantUnitCollection($plantUnits);

        $plantUnitDtos = [];

        foreach ($plantUnitCollection->toArray() as $plantUnit) {
            $plantImageData = $plantUnit->getPlantImage()->getValue();
            $plantImage = Base64Service::base64FileEncode($plantImageData, 'plantUnitImage');
            $plant = $this->plantRepository->findById($plantUnit->getPlantId());
            $plantUnitDtos[] =
                new PlantUnitDetailDto(
                    $plantUnit->getPlantUnitId()->getId(),
                    $plantUnit->getPlantId()->getId(),
                    $plantUnit->getUserId()->getId(),
                    $plantUnit->getCheckSeatId()->getId(),
                    $plantUnit->getPlantName()->getValue(),
                    $plantImage,
                    $plantUnit->getDiaries(),
                    $plantUnit->getCreateDate()->format('Y/m/d'),
                    $plantUnit->getUpdateDate()->format('Y/m/d'),
                    $plant->getName(),
                    $plant->getScientific()
                );
        }
        Log::info(__METHOD__, ['終了']);

        return new PlantUnitsWrapDto($plantUnitDtos);
    }
}
