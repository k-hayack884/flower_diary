<?php

namespace Packages\Usecases\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\Presentations\Requests\Fertilizer\UpdateFertilizerSettingRequest;
use App\Packages\Usecases\Fertilizer\UpdateFertilizerSettingAction;
use PHPUnit\Framework\TestCase;

class UpdateFertilizerSettingActionTest extends TestCase
{
    public function test_指定した水やり設定のレスポンスの型があっていること()
    {
        $fertilizerSettingId = '334c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = UpdateFertilizerSettingRequest::create('fertilizer/settings', 'POST', [
            'fertilizerSetting' => [
                'fertilizerSetting.months' => [5, 7, 9],
                'fertilizerSetting.note' => 'ち～ん',
                'fertilizerSetting.amount' => 334,
                'fertilizerSetting.name' => '甲子園の土',
            ]
        ]);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(UpdateFertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new UpdateFertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });

        $prevFertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingId($fertilizerSettingId));
        $result = (app()->make(UpdateFertilizerSettingAction::class))->__invoke($request, $fertilizerSettingId);

        $this->assertSame( [5, 7, 9],$result->fertilizerSettings->months);
        $this->assertSame( 'ち～ん',$result->fertilizerSettings->note);
        $this->assertSame( 334,$result->fertilizerSettings->fertilizerAmount);
        $this->assertSame( '甲子園の土',$result->fertilizerSettings->fertilizerName);
        $this->assertNotEquals($prevFertilizerSetting->getFertilizerNote()->getvalue(), $result->fertilizerSettings->note);
    }

    public function test_存在しない肥料設定IDを入力するとエラーを返すこと()
    {
        $fertilizerSettingId = new Uuid();
        $request = UpdatefertilizerSettingRequest::create('fertilizer/settings/Update', 'POST', [
            'fertilizerSetting' => [
                'fertilizerSetting.months' => [5, 7, 9],
                'fertilizerSetting.note' => 'ち～ん',
                'fertilizerSetting.amount' => 334,
                'fertilizerSetting.name' => '甲子園の土',
            ]
        ]);
        $mockFertilizerSettingRepository = app()->make(MockfertilizerRepository::class);

        app()->bind(UpdatefertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new UpdatefertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $this->expectExceptionMessage('指定した肥料設定IDは見つかりませんでした (id:' . $fertilizerSettingId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(UpdatefertilizerSettingAction::class))->__invoke($request, $fertilizerSettingId);
        $fertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingId($fertilizerSettingId));
    }
}
