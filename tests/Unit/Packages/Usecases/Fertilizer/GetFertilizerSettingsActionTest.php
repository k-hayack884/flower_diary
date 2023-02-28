<?php

namespace Packages\Usecases\Fertilizer;

use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingRequest;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingsRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingDto;
use App\Packages\Usecases\Fertilizer\GetFertilizerSettingsAction;
use PHPUnit\Framework\TestCase;

class GetFertilizerSettingsActionTest extends TestCase
{
    public function test_肥料設定のレスポンスの型があっていること()
    {
        $request = GetFertilizerSettingsRequest::create('fertilizerSetting', 'GET', []);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(GetFertilizerSettingsAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new GetFertilizerSettingsAction(
                $mockFertilizerSettingRepository
            );
        });
        $result = (app()->make(GetFertilizerSettingsAction::class))->__invoke($request);

        $this->assertInstanceOf(FertilizerSettingDto::class, $result->fertilizerSettings[0]);
    }
}
