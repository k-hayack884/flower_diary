<?php

namespace Packages\infrastructures\Repositories\PlantUnit;

use App\Packages\Domains\CheckSeat\CheckSeatId;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\PlantUnit\plantName;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\PlantUnit\PlantUnitRepository;
use Tests\TestCase;


class PlantUnitRepositoryTest extends TestCase
{
    private PlantUnitRepository $plantUnitRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->plantUnitRepository = new PlantUnitRepository();
    }
    public function test_設定を追加する()
    {
        $addPlantUnit[] = new PlantUnit(
            new PlantUnitId('532c1092-7a0d-40b0-af6e-30bff5975e31'),
            new PlantId('753c1092-7a0d-40b0-af6e-30bff5975e31'),
            new UserId('883c1092-7a0d-40b0-af6e-30bff5975e31'),
            new CheckSeatId('889c1092-7a0d-40b0-af6e-30bff5975e31'),
            new PlantName('クリスマスローズ'),
            ['553c1092-7a0d-40b0-af6e-30bff5975e31', '321c1092-7a0d-40b0-af6e-30bff5975e31', '902c1092-7a0d-40b0-af6e-30bff5975e31'],
        );

        $plantUnitCollection = new PlantUnitCollection($addPlantUnit);
        $this->plantUnitRepository->save($plantUnitCollection);

        $addPlantUnitArray = $this->plantUnitRepository->find();
        $this->assertSame($addPlantUnit[0]->getPlantUnitId(), $addPlantUnitArray[2]->getPlantUnitId());
    }
}
