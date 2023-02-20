<?php

namespace Packages\Usecases\PlantUnit;

use App\Packages\infrastructures\PlantUnit\MockPlantUnitRepository;
use App\Packages\Presentations\Requests\PlantUnit\CreatePlantUnitRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;
use App\Packages\Usecases\PlantUnit\CreatePlantUnitAction;
use PHPUnit\Framework\TestCase;

class CreatePlantUnitActionTest extends TestCase
{
    public function test_作成した日記のレスポンスの型があっていること()
    {
        $request = CreatePlantUnitRequest::create('plantUnit', 'POST', [
                'plantUnitUserId'=>'666c1092-7a0d-40b0-af6e-30bff5975e31',
                'plantUnitPlantId'=> '893c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockPlantUnitRepository = app()->make(MockPlantUnitRepository::class);

        app()->bind(CreatePlantUnitAction::class, function () use (
            $mockPlantUnitRepository
        ) {
            return new CreatePlantUnitAction(
                $mockPlantUnitRepository
            );
        });
        $result = (app()->make(CreatePlantUnitAction::class))->__invoke($request);

        $this->assertInstanceOf(PlantUnitWrapDto::class, $result);
    }
}
