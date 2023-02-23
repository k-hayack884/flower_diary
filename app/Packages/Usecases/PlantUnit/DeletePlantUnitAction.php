<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Presentations\Requests\PlantUnit\DeletePlantUnitRequest;
use Exception;

class DeletePlantUnitAction
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
     * @param DeletePlantUnitRequest $deletePlantUnitRequest
     * @return void
     * @throws Exception
     */

    public function __invoke(
        DeletePlantUnitRequest $deletePlantUnitRequest,
    ): void
    {
        $requestId=$deletePlantUnitRequest->getId();

        try {
            $hitPlantUnit= $this->plantUnitRepository->findById(new PlantUnitId($requestId));
            $this->plantUnitRepository->delete($hitPlantUnit->getPlantUnitId());
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
