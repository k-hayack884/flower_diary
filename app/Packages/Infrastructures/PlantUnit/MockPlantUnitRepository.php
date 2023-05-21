<?php

namespace App\Packages\infrastructures\PlantUnit;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;
use App\Packages\Domains\User\UserId;

class MockPlantUnitRepository implements PlantUnitRepositoryInterface
{
    /**
     * @var PlantUnit[]
     */
    private array $plantUnits = [];

    public function __construct()
    {
        $this->plantUnits[] =
            new PlantUnit(
                new PlantUnitId('001c1092-7a0d-40b0-af6e-30bff5975e31'),
                new PlantId('111c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('222c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CheckSeatId('555c1092-7a0d-40b0-af6e-30bff5975e31'),
                new PlantName('バラ'),
                ['333c1092-7a0d-40b0-af6e-30bff5975e31', '335c1092-7a0d-40b0-af6e-30bff5975e31', '336c1092-7a0d-40b0-af6e-30bff5975e31'],
            );
        $this->plantUnits[] =
            new PlantUnit(
                new PlantUnitId('002c1092-7a0d-40b0-af6e-30bff5975e31'),
                new PlantId('112c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('224c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CheckSeatId('556c1092-7a0d-40b0-af6e-30bff5975e31'),
                new PlantName('クレマチス'),
                ['337c1092-7a0d-40b0-af6e-30bff5975e31', '338c1092-7a0d-40b0-af6e-30bff5975e31', '339c1092-7a0d-40b0-af6e-30bff5975e31'],
            );
    }

    /**
     * @return PlantUnit[]
     */
    public function find(): array
    {
        return $this->plantUnits;
    }
    public function findByUser(UserId $userId): array
    {
        // TODO: Implement findByUser() method.
    }

    /**
     * @param PlantUnitId $plantUnitId
     * @return PlantUnit
     * @throws NotFoundException
     */
    public function findById(PlantUnitId $plantUnitId): PlantUnit
    {
        foreach ($this->plantUnits as $plantUnit) {
            if ($plantUnit->getPlantUnitId()->equals($plantUnitId)) {
                return $plantUnit;
            }
        }
        throw new NotFoundException('指定した植物ユニットIDは見つかりませんでした (id:' . $plantUnitId->getId() . ')');
    }

    /**
     * @param PlantUnitCollection $plantUnits
     * @return void
     */
    public function save(PlantUnitCollection $plantUnits): void
    {
        $collectionArray = $plantUnits->toArray();
        foreach ($collectionArray as $collectionValue) {
            $this->plantUnits[] = $collectionValue;
        }
    }

    /**
     * @param PlantUnitId $plantUnitId
     * @return void
     * @throws NotFoundException
     */
    public function delete(PlantUnitId $plantUnitId): void
    {
        $deleteSetting = $this->findById($plantUnitId);
        $index = array_search($deleteSetting, $this->plantUnits);
        unset($this->plantUnits[$index]);
    }
}
