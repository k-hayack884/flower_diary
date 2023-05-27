<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitImage;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\Plant\PlantRepository;
use App\Packages\Presentations\Requests\PlantUnit\UpdatePlantUnitNameRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UpdatePlantUnitNameAction
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
    public function __construct(PlantUnitRepositoryInterface $plantUnitRepository, PlantRepository $plantRepository)
    {
        $this->plantUnitRepository = $plantUnitRepository;
        $this->plantRepository = $plantRepository;
    }

    /**
     * @param UpdatePlantUnitNameRequest $updatePlantUnitRequest
     * @return PlantUnitWrapDto
     */
    public function __invoke(
        UpdatePlantUnitNameRequest $updatePlantUnitRequest
    ): PlantUnitWrapDto
    {

        Log::info(__METHOD__, ['開始']);
        try {
            $plantUnitId = new PlantUnitId($updatePlantUnitRequest->getPlantUnitId());
            $plantId = new PlantId($updatePlantUnitRequest->getPlantId());
            $plantName = $updatePlantUnitRequest->getPlantName();

            $hitPlantUnit = $this->plantUnitRepository->findById($plantUnitId);
            if ($plantName === null) {
                $defaultName = $this->plantRepository->findById($plantId)->getName();
                $updateName=$hitPlantUnit->getPlantName()->update($defaultName);
            } else {
                $updateName=$hitPlantUnit->getPlantName()->update($plantName);
            }


            $plantUnit = new PlantUnit(
                $hitPlantUnit->getPlantUnitId(),
                $hitPlantUnit->getPlantId(),
                $hitPlantUnit->getUserId(),
                $hitPlantUnit->getCheckSeatId(),
                $updateName,
                $hitPlantUnit->getPlantImage(),
                $hitPlantUnit->getDiaries()
            );
            $plantUnitCollection = new PlantUnitCollection();
            $plantUnitCollection->addUnit($plantUnit);
            $this->plantUnitRepository->save($plantUnitCollection);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400, $e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }

        return PlantUnitDtoFactory::create($plantUnit);
    }
}
