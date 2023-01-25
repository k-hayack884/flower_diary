<?php

namespace Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerSettingID;
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

        $prevFertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingID($fertilizerSettingId));
        $prevFertilizerSettingValue = $prevFertilizerSetting->getFertilizerSettingId();
        $result = (app()->make(UpdateFertilizerSettingAction::class))->__invoke($request, $fertilizerSettingId);
        $fertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingID($fertilizerSettingId));
        $this->assertSame( 'ち～ん',$result->fertilizerSettings->note);
        $this->assertNotEquals($prevFertilizerSetting->getFertilizerNote()->getvalue(),$result->fertilizerSettings->note);
    }
}
