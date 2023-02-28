<?php

namespace Packages\Usecases\PlantUnit;

use App\Packages\infrastructures\PlantUnit\MockPlantUnitRepository;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitRequest;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitDto;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;
use App\Packages\Usecases\PlantUnit\GetPlantUnitAction;
use PHPUnit\Framework\TestCase;

class GetPlantUnitActionTest extends TestCase
{
    public function test_水やり設定のレスポンスの型があっていること()
    {
        $request = GetPlantUnitRequest::create('plantUnit', 'GET', [
            'plantUnitId'=>'001c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockPlantUnitSettingRepository = app()->make(MockPlantUnitRepository::class);

        app()->bind(GetPlantUnitAction::class, function () use (
            $mockPlantUnitSettingRepository
        ) {
            return new GetPlantUnitAction(
                $mockPlantUnitSettingRepository
            );
        });
        $result = (app()->make(GetPlantUnitAction::class))->__invoke($request);

        $this->assertInstanceOf(PlantUnitWrapDto::class, $result);
        $this->assertSame('001c1092-7a0d-40b0-af6e-30bff5975e31',$result->plantUnit->plantUnitId);
    }
}
