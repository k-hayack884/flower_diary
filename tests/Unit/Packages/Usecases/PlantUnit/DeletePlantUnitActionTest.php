<?php

namespace Packages\Usecases\PlantUnit;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\PlantUnit\MockPlantUnitRepository;
use App\Packages\Presentations\Requests\PlantUnit\DeletePlantUnitRequest;
use App\Packages\Usecases\PlantUnit\DeletePlantUnitAction;
use PHPUnit\Framework\TestCase;

class DeletePlantUnitActionTest extends TestCase
{
    public function test_指定した植物ユニットが削除されていること()
    {
        $request = DeletePlantUnitRequest::create('plantUnit', 'DELETE', [
            'plantUnitId'=>'334c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockPlantUnitRepository = app()->make(MockPlantUnitRepository::class);

        app()->bind(DeletePlantUnitAction::class, function () use (
            $mockPlantUnitRepository
        ) {
            return new DeletePlantUnitAction(
                $mockPlantUnitRepository
            );
        });
        $this->expectExceptionMessage('指定した植物ユニットIDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeletePlantUnitAction::class))->__invoke($request);
        $plantUnit = $mockPlantUnitRepository->findById(new PlantUnitId($request->getId()));
    }

    public function test_存在しない植物ユニットIDを入力するとエラーを返すこと()
    {
        $plantUnitId =new Uuid();
        $request = DeletePlantUnitRequest::create('plantUnit', 'DELETE', [
            'plantUnitId'=>$plantUnitId->getValue()
        ]);
        $mockPlantUnitRepository = app()->make(MockPlantUnitRepository::class);

        app()->bind(DeletePlantUnitAction::class, function () use (
            $mockPlantUnitRepository
        ) {
            return new DeletePlantUnitAction(
                $mockPlantUnitRepository
            );
        });
        $this->expectExceptionMessage('指定した植物ユニットIDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeletePlantUnitAction::class))->__invoke($request);
        $plantUnit = $mockPlantUnitRepository->findById(new PlantUnitId($request->getId()));
    }
}
