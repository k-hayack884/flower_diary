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
        $request = UpdateWaterSettingRequest::create('waterSetting', 'POST', [
            'waterSettingId' => '334c1092-7a0d-40b0-af6e-30bff5975e31',
            'waterSettingMonths' => [5, 7, 9],
            'waterSettingNote' => 'ち～ん',
            'waterSettingAmount' => 'moderate_amount',
            'waterSettingTimes' => 3,
            'waterSettingInterval' => 34,
            'waterSettingAlertTimes' => ['12:00', '17:30'],
        ]);
        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(UpdateWaterSettingAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new UpdateWaterSettingAction(
                $mockWaterSettingRepository
            );
        });

        $prevWaterSetting = $mockWaterSettingRepository->findById(new WaterSettingId($request->getId()));
        $result = (app()->make(UpdateWaterSettingAction::class))->__invoke($request);

        $this->assertSame([5, 7, 9], $result->waterSetting->months);
        $this->assertSame('ち～ん', $result->waterSetting->note);
        $this->assertSame('moderate_amount', $result->waterSetting->waterAmount);
        $this->assertSame(3, $result->waterSetting->wateringTimes);
        $this->assertSame(34, $result->waterSetting->wateringInterval);
        $this->assertSame(['12:00', '17:30'], $result->waterSetting->alertTimes);
        $this->assertNotEquals($prevWaterSetting->getWaterNote()->getValue(), $result->waterSetting->note);
    }

    public function test_存在しない水やり設定IDを入力するとエラーを返すこと()
    {
        $waterSettingId = new Uuid();
        $request = UpdateWaterSettingRequest::create('waterSetting', 'POST', [
            'waterSettingId' => $waterSettingId,
            'waterSettingMonths' => [5, 7, 9],
            'waterSettingNote' => 'ち～ん',
            'waterSettingAmount' => 'moderate_amount',
            'waterSettingTimes' => 3,
            'waterSettingInterval' => 34,
            'waterSettingAlertTime' => ['12:00', '17:30'],
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
