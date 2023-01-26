<?php

namespace Packages\Usecases\Fertilizer;

use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingDto;
use App\Packages\Usecases\Fertilizer\GetFertilizerSettingsAction;
use PHPUnit\Framework\TestCase;

class GetFertilizerSettingActionTest extends TestCase
{
    public function test_水やり設定のレスポンスの型があっていること()
    {
        $request = GetFertilizerSettingRequest::create('fertilizer/settings', 'GET', []);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(GetFertilizerSettingsAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new GetFertilizerSettingsAction(
                $mockFertilizerSettingRepository
            );
        });
        $result = (app()->make(GetFertilizerSettingsAction::class))->__invoke($request);

        $this->assertInstanceOf(FertilizerSettingDto::class, $result->fertilizeSettings[0]);
        $this->assertSame('983c1092-7a0d-40b0-af6e-30bff5975e31',$result->fertilizeSettings[0]->fertilizerSettingId);
    }
}
