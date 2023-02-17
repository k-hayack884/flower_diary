<?php

namespace App\Packages\infrastructures\PlantUnit;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\User\UserId;

class MockPlantUnitRepository
{
    private array $plantUnits = [];

    public function __construct()
    {
        $this->plantUnits[] =
            new PlantUnit(
                new PlantUnitId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                new PlantId('123c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('883c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CheckSeatId('456c1092-7a0d-40b0-af6e-30bff5975e31'),
                new PlantName('バラ'),
                ['774c1092-7a0d-40b0-af6e-30bff5975e31', '721c1092-7a0d-40b0-af6e-30bff5975e31', '800c1092-7a0d-40b0-af6e-30bff5975e31'],
            );
        $this->plantUnits[] =
            new PlantUnit(
                new PlantUnitId('999c1092-7a0d-40b0-af6e-30bff5975e31'),
                new PlantId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                new UserId('666c1092-7a0d-40b0-af6e-30bff5975e31'),
                new CheckSeatId('334c1092-7a0d-40b0-af6e-30bff5975e31'),
                new PlantName('クレマチス'),
                ['135c1092-7a0d-40b0-af6e-30bff5975e31', '832c1092-7a0d-40b0-af6e-30bff5975e31', '127c1092-7a0d-40b0-af6e-30bff5975e31'],
            );
    }

    /**
     * @return array
     */
    public function find(): array
    {
        return $this->plantUnits;
    }

    /**
     * @param PlantUnitId $plantUnitId
     * @return PlantUnit
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
     * @param PlantUnitCollection $plantUnitCollection
     * @return void
     */
    public function save(PlantUnitCollection $plantUnitCollection): void
    {
        $collectionArray = $plantUnitCollection->toArray();
        foreach ($collectionArray as $collectionValue) {
            $this->plantUnits[] = $collectionValue;
        }
    }

    /**
     * @param PlantUnitId $plantUnitId
     * @return void
     */
    public function delete(PlantUnitId $plantUnitId): void
    {
        $deleteSetting = $this->findById($plantUnitId);
        $index = array_search($deleteSetting, $this->plantUnits);
        unset($this->plantUnits[$index]);

    }
}
