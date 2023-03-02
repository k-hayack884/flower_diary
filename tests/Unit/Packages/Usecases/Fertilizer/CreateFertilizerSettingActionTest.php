<?php

namespace Packages\Usecases\Fertilizer;

use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\Presentations\Requests\Fertilizer\CreateFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;
use App\Packages\Usecases\Fertilizer\CreateFertilizerSettingAction;
use Tests\TestCase;

class CreateFertilizerSettingActionTest extends TestCase
{
    public function test_作成した水やり設定のレスポンスの型があっていること()
    {
        $request = CreateFertilizerSettingRequest::create('fertilizerSetting', 'POST', [
                'fertilizerSettingMonths'=>[10,12],
                'fertilizerSettingNote'=>null,
                'fertilizerSettingAmount'=>15,
                'fertilizerSettingName'=>'鶏糞堆肥',
        ]);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(CreateFertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new CreateFertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $result = (app()->make(CreateFertilizerSettingAction::class))->__invoke($request);

        $this->assertInstanceOf(FertilizerSettingWrapDto::class, $result);
    }
}
