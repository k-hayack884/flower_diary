<?php

namespace Packages\usecases\Water;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\infrastructures\Water\MockWaterRepository;
use App\Packages\Presentations\Requests\Water\DeleteWaterSettingRequest;
use App\Packages\Usecases\Water\DeleteWaterSettingAction;
use PHPUnit\Framework\TestCase;

class DeleteWaterSettingActionTest extends TestCase
{
    public function test_指定した水やり設定が削除されていること()
    {
        $waterSettingId = '983c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = DeleteWaterSettingRequest::create('water/settings', 'DELETE', []);
        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(DeleteWaterSettingAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new DeleteWaterSettingAction(
                $mockWaterSettingRepository
            );
        });
        $this->expectExceptionMessage('選んだ設定が見つかりませんでした (id:' . $waterSettingId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteWaterSettingAction::class))->__invoke($request, $waterSettingId);
        $waterSetting = $mockWaterSettingRepository->findById(new WaterSettingId($waterSettingId));
    }

    public function test_存在しない水やり設定IDを入力するとエラーを返すこと()
    {
        $waterSettingId = new Uuid();
        $request = DeleteWaterSettingRequest::create('water/settings', 'DELETE', []);
        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(DeleteWaterSettingAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new DeleteWaterSettingAction(
                $mockWaterSettingRepository
            );
        });
        $this->expectExceptionMessage('選んだ設定が見つかりませんでした (id:' . $waterSettingId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteWaterSettingAction::class))->__invoke($request, $waterSettingId);
        $waterSetting = $mockWaterSettingRepository->findById(new WaterSettingId($waterSettingId));
    }
}
