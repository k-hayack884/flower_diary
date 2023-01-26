<?php

namespace Packages\usecases\Water;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\infrastructures\Water\MockWaterRepository;
use App\Packages\Presentations\Requests\Water\UpdateWaterSettingRequest;
use App\Packages\Usecases\Water\UpdateWaterSettingAction;
use PHPUnit\Framework\TestCase;

class UpdateWaterSettingActionTest extends TestCase
{
    public function test_指定した水やり設定のレスポンスの型があっていること()
    {
        $waterSettingId = '334c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = UpdateWaterSettingRequest::create('water/settings', 'POST', [
            'waterSetting' => [
                'waterSetting.months' => [5, 7, 9],
                'waterSetting.note' => 'ち～ん',
                'waterSetting.amount' => 'moderate_amount',
                'waterSetting.times' => 3,
                'waterSetting.interval' => 34,
                'waterSetting.alertTime'=>['12:00','17:30'],
            ]
        ]);
        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(UpdateWaterSettingAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new UpdateWaterSettingAction(
                $mockWaterSettingRepository
            );
        });

        $prevWaterSetting = $mockWaterSettingRepository->findById(new WaterSettingId($waterSettingId));
        $result = (app()->make(UpdateWaterSettingAction::class))->__invoke($request, $waterSettingId);

        $this->assertSame( [5, 7, 9],$result->waterSettings->months);
        $this->assertSame( 'ち～ん',$result->waterSettings->note);
        $this->assertSame( 'moderate_amount',$result->waterSettings->waterAmount);
        $this->assertSame( 3,$result->waterSettings->wateringTimes);
        $this->assertSame( 34,$result->waterSettings->wateringInterval);
        $this->assertSame( ['12:00','17:30'],$result->waterSettings->alertTimes);
        $this->assertNotEquals($prevWaterSetting->getWaterNote()->getValue(),$result->waterSettings->note);
    }

    public function test_存在しない水やり設定IDを入力するとエラーを返すこと()
    {
        $waterSettingId = new Uuid();
        $request = UpdateWaterSettingRequest::create('water/settings', 'POST', [
            'waterSetting' => [
                'waterSetting.months' => [5, 7, 9],
                'waterSetting.note' => 'ち～ん',
                'waterSetting.amount' => 'moderate_amount',
                'waterSetting.times' => 3,
                'waterSetting.interval' => 34,
                'waterSetting.alertTime'=>['12:00','17:30'],
            ]
        ]);
        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(UpdateWaterSettingAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new UpdateWaterSettingAction(
                $mockWaterSettingRepository
            );
        });
        $this->expectExceptionMessage('指定した水やり設定IDは見つかりませんでした (id:' . $waterSettingId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(UpdateWaterSettingAction::class))->__invoke($request, $waterSettingId);
        $waterSetting = $mockWaterSettingRepository->findById(new WaterSettingId($waterSettingId));
    }
}
