<?php

namespace Packages\Usecases\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingRequest;
use App\Packages\Usecases\Dto\Fertilizer\FertilizerSettingWrapDto;
use App\Packages\Usecases\Fertilizer\GetFertilizerSettingAction;
use PHPUnit\Framework\TestCase;

class GetFertilizerSettingActionTest extends TestCase
{
    public function test_肥料設定詳細のレスポンスの型があっていること()
    {
        $request = GetFertilizerSettingRequest::create('fertilizer', 'GET', [
            'fertilizerSettingId' => '888c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(GetFertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new GetFertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $result = (app()->make(GetFertilizerSettingAction::class))->__invoke($request);

        $this->assertInstanceOf(FertilizerSettingWrapDto::class, $result);
        $this->assertSame( '888c1092-7a0d-40b0-af6e-30bff5975e31', $result->fertilizerSetting->fertilizerSettingId);
    }

    public function test_存在しないIDの場合エラーを出すこと()
    {
        $fertilizerSettingId =new Uuid();
        $request = GetFertilizerSettingRequest::create('fertilizer', 'GET', [
            'fertilizerSettingId' => $fertilizerSettingId
        ]);        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(GetFertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new GetFertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $this->expectExceptionMessage('指定した肥料設定IDは見つかりませんでした (id:' .$request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(GetFertilizerSettingAction::class))->__invoke($request);

    }
}
