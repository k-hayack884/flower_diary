<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;
use App\Packages\Presentations\Requests\PlantUnit\CreatePlantUnitRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;
use Exception;

class CreatePlantUnitAction
{
    public function __construct(PlantUnitRepositoryInterface $plantUnitRepository)
    {
        $this->plantUnitRepository = $plantUnitRepository;
    }

    public function __invoke(
        CreatePlantUnitRequest $createPlantUnitRequest
    ): PlantUnitWrapDto
    {

        try {
            $plantUnitId = new PlantUnitId();
            $plantId =new PlantId($createPlantUnitRequest->getPlantUnitPlantId());
            $userId = new UserId($createPlantUnitRequest->getPlantUnitUserId());
            $plantUnitCheckSeatId = new CheckSeatId();
            //Todo PlantRepositoryを作ったら植物ユニットIDから名前を取得するように改良
            $plantName=new PlantName('');
            $plantDiaries = [];

            $plantUnit=new PlantUnit(
                $plantUnitId,
                $plantId,
                $userId,
                $plantUnitCheckSeatId,
                $plantName,
                $plantDiaries
            );
            $plantUnitCollection = new PlantUnitCollection();
            $this->plantUnitRepository->save($plantUnitCollection);
        } catch (Exception $e) {
            throw  $e;
        }
        return PlantUnitDtoFactory::create($plantUnit);
    }

}
