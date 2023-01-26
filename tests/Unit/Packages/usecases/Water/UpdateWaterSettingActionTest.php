<?php

namespace Packages\usecases\Water;

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
        $prevWaterSettingValue = $prevWaterSetting->getWaterSettingId();
        $result = (app()->make(UpdateWaterSettingAction::class))->__invoke($request, $waterSettingId);
        $waterSetting = $mockWaterSettingRepository->findById(new WaterSettingId($waterSettingId));
        $this->assertSame( 'ち～ん',$result->waterSettings->note);
        $this->assertNotEquals($prevWaterSetting->getWaterNote()->getNote(),$result->waterSettings->note);
    }
}
