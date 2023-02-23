<?php

namespace Packages\usecases\Water;

use App\Packages\infrastructures\Water\MockWaterRepository;
use App\Packages\Presentations\Requests\Water\CreateWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use App\Packages\Usecases\Water\CreateWaterSettingAction;
use App\Packages\Usecases\Water\CreateWaterSettingsAction;
use PHPUnit\Framework\TestCase;

class CreateWaterSettingActionTest extends TestCase
{
    public function test_作成した水やり設定のレスポンスの型があっていること()
    {
        $request = CreateWaterSettingRequest::create('waterSetting', 'POST', [
            'waterSettingMonths'=>[2,3,4],
            'waterSettingNote'=>null,
            'waterSettingAmount'=>'a_lot',
            'waterSettingTimes'=>2,
            'waterSettingInterval'=>4
        ]);
        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(CreateWaterSettingAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new CreateWaterSettingAction(
                $mockWaterSettingRepository
            );
        });
        $result = (app()->make(CreateWaterSettingAction::class))->__invoke($request);

        $this->assertInstanceOf(WaterSettingWrapDto::class, $result);
    }
}
