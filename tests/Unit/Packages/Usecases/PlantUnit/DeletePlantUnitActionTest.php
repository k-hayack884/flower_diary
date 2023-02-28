<?php

namespace Packages\Usecases\PlantUnit;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\CheckSeat\MockCheckSeatRepository;
use App\Packages\infrastructures\Comment\MockCommentRepository;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\infrastructures\PlantUnit\MockPlantUnitRepository;
use App\Packages\infrastructures\Shared\MockTransaction;
use App\Packages\infrastructures\Water\MockWaterRepository;
use App\Packages\Presentations\Requests\PlantUnit\DeletePlantUnitRequest;
use App\Packages\Usecases\PlantUnit\DeletePlantUnitAction;
use PHPUnit\Framework\TestCase;

class DeletePlantUnitActionTest extends TestCase
{
    public function test_指定した植物ユニットが削除されていること()
    {
        $request = DeletePlantUnitRequest::create('plantUnit', 'DELETE', [
            'plantUnitId'=>'001c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockPlantUnitRepository = app()->make(MockPlantUnitRepository::class);
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);
        $mockCommentRepository = app()->make(MockCommentRepository::class);
        $mockCheckSeatRepository = app()->make(MockCheckSeatRepository::class);
        $mockWaterRepository = app()->make(MockWaterRepository::class);
        $mockFertilizerRepository = app()->make(MockFertilizerRepository::class);
        $testTransaction= app()->make(MockTransaction::class);


        app()->bind(DeletePlantUnitAction::class, function () use (
            $mockPlantUnitRepository,
            $mockDiaryRepository,
            $mockCommentRepository,
            $mockCheckSeatRepository,
            $mockWaterRepository,
            $mockFertilizerRepository,
            $testTransaction
        ) {
            return new DeletePlantUnitAction(
                $mockPlantUnitRepository,
                $mockDiaryRepository,
                $mockCommentRepository,
                $mockCheckSeatRepository,
                $mockWaterRepository,
                $mockFertilizerRepository,
            $testTransaction
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
        $mockDiaryRepository = app()->make(MockDiaryRepository::class);
        $mockCommentRepository = app()->make(MockCommentRepository::class);
        $mockCheckSeatRepository = app()->make(MockCheckSeatRepository::class);
        $mockWaterRepository = app()->make(MockWaterRepository::class);
        $mockFertilizerRepository = app()->make(MockFertilizerRepository::class);
        $testTransaction= app()->make(MockTransaction::class);


        app()->bind(DeletePlantUnitAction::class, function () use (
            $mockPlantUnitRepository,
            $mockDiaryRepository,
            $mockCommentRepository,
            $mockCheckSeatRepository,
            $mockWaterRepository,
            $mockFertilizerRepository,
            $testTransaction
        ) {
            return new DeletePlantUnitAction(
                $mockPlantUnitRepository,
                $mockDiaryRepository,
                $mockCommentRepository,
                $mockCheckSeatRepository,
                $mockWaterRepository,
                $mockFertilizerRepository,
                $testTransaction
            );
        });
        $this->expectExceptionMessage('指定した植物ユニットIDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeletePlantUnitAction::class))->__invoke($request);
        $plantUnit = $mockPlantUnitRepository->findById(new PlantUnitId($request->getId()));
    }
}
