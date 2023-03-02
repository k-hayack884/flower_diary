<?php

namespace Packages\Usecases\PlantUnit;

use App\Packages\infrastructures\PlantUnit\MockPlantUnitRepository;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitsRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitsWrapDto;
use App\Packages\Usecases\PlantUnit\GetPlantUnitsAction;
use Tests\TestCase;

class GetPlantUnitsActionTest extends TestCase
{
    public function test_植物ユニットのレスポンスの型があっていること()
    {
        $request = GetPlantUnitsRequest::create('diary', 'GET', []);
        $mockPlantUnitRepository = app()->make(MockPlantUnitRepository::class);

        app()->bind(GetPlantUnitsAction::class, function () use (
            $mockPlantUnitRepository
        ) {
            return new GetPlantUnitsAction(
                $mockPlantUnitRepository
            );
        });
        $result = (app()->make(GetPlantUnitsAction::class))->__invoke($request);

        $this->assertInstanceOf(PlantUnitsWrapDto::class, $result);
    }
}
