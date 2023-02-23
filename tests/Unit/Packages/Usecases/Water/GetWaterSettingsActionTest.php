<?php

namespace Packages\usecases\Water;

use App\Packages\infrastructures\Water\MockWaterRepository;
use App\Packages\Presentations\Requests\Water\GetWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\GetWaterSettingsRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingDto;
use App\Packages\Usecases\Water\GetWaterSettingAction;
use App\Packages\Usecases\Water\GetWaterSettingsAction;
use PHPUnit\Framework\TestCase;

class GetWaterSettingsActionTest extends TestCase
{
    public function test_水やり設定のレスポンスの型があっていること()
    {
        $request = GetWaterSettingsRequest::create('waterSetting', 'GET', []);
        $mockWaterSettingRepository = app()->make(MockWaterRepository::class);

        app()->bind(GetWaterSettingsAction::class, function () use (
            $mockWaterSettingRepository
        ) {
            return new GetWaterSettingsAction(
                $mockWaterSettingRepository
            );
        });
        $result = (app()->make(GetWaterSettingsAction::class))->__invoke($request);

        $this->assertInstanceOf(WaterSettingDto::class, $result->waterSettings[0]);
        $this->assertSame('983c1092-7a0d-40b0-af6e-30bff5975e31',$result->waterSettings[0]->waterSettingId);
    }

}
