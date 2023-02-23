<?php

namespace Packages\Usecases\Water;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\infrastructures\Water\MockWaterRepository;
use App\Packages\Presentations\Requests\Water\ResetWaterSettingRequest;
use App\Packages\Usecases\Water\ResetWaterSettingAction;
use PHPUnit\Framework\TestCase;

class ResetWaterSettingActionTest extends TestCase
{
    public function test_指定した水やり設定がリセットされていること()
    {
        $request = ResetWaterSettingRequest::create('waterSetting/reset', 'POST', [
            'waterSettingId'=>'983c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(ResetWaterSettingAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new ResetWaterSettingAction(
                $mockWaterSettingRepository
            );
        });
        $prevWaterSetting = $mockWaterSettingRepository->findById(new WaterSettingId($request->getId()));
        $result = (app()->make(ResetWaterSettingAction::class))->__invoke($request);

        $this->assertSame( [1,2,3,4,5,6,7,8,9,10,11,12],$result->waterSetting->months);
        $this->assertSame( '',$result->waterSetting->note);
        $this->assertSame( 'moderate_amount',$result->waterSetting->waterAmount);
        $this->assertSame( 1,$result->waterSetting->wateringTimes);
        $this->assertSame( 1,$result->waterSetting->wateringInterval);
        $this->assertEmpty($result->waterSetting->alertTimes);
        $this->assertNotEquals($prevWaterSetting->getWaterNote()->getValue(),$result->waterSetting->note);
    }
    public function test_存在しない水やり設定IDを入力するとエラーを返すこと()
    {
        $waterSettingId = new Uuid();
        $request = ResetWaterSettingRequest::create('waterSetting/reset', 'POST', [
            'waterSettingId'=>$waterSettingId
        ]);        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(ResetWaterSettingAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new ResetWaterSettingAction(
                $mockWaterSettingRepository
            );
        });
        $this->expectExceptionMessage('指定した水やり設定IDは見つかりませんでした (id:' . $request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(ResetWaterSettingAction::class))->__invoke($request);
        $waterSetting = $mockWaterSettingRepository->findById(new WaterSettingId($request->getId()));
    }
}
