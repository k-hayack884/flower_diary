<?php

namespace Packages\Usecases\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\Presentations\Requests\Fertilizer\ResetFertilizerSettingRequest;
use App\Packages\Usecases\Fertilizer\ResetFertilizerSettingAction;
use PHPUnit\Framework\TestCase;

class ResetFertilizerSettingActionTest extends TestCase
{
    public function test_指定した肥料設定がリセットされていること()
    {
        $request = ResetfertilizerSettingRequest::create('fertilizerSetting/reset', 'POST', [
            'fertilizerSettingId' => '888c1092-7a0d-40b0-af6e-30bff5975e31'
        ]);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(ResetFertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new ResetfertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $prevFertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingId($request->getId()));
        $result = (app()->make(ResetFertilizerSettingAction::class))->__invoke($request);

        $this->assertSame( [],$result->fertilizerSetting->months);
        $this->assertSame( '',$result->fertilizerSetting->note);
        $this->assertSame( 0,$result->fertilizerSetting->fertilizerAmount);
        $this->assertSame( '',$result->fertilizerSetting->fertilizerName);
        $this->assertNotEquals($prevFertilizerSetting->getfertilizerNote()->getValue(),$result->fertilizerSetting->note);
    }
    public function test_存在しない肥料設定IDを入力するとエラーを返すこと()
    {
        $fertilizerSettingId = new Uuid();
        $request = ResetfertilizerSettingRequest::create('fertilizerSetting/reset', 'POST', [
            'fertilizerSettingId' => $fertilizerSettingId
        ]);
        $mockFertilizerSettingRepository = app()->make(MockfertilizerRepository::class);

        app()->bind(ResetfertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new ResetfertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $this->expectExceptionMessage('指定した肥料設定IDは見つかりませんでした (id:' .$request->getId() . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(ResetfertilizerSettingAction::class))->__invoke($request);
        $fertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingId());
    }
}
