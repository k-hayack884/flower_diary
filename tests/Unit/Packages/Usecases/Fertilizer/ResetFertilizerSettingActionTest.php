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
        $fertilizerSettingId = '983c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = ResetfertilizerSettingRequest::create('fertilizer/settings/reset', 'POST', []);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(ResetFertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new ResetfertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $prevFertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingId($fertilizerSettingId));
        $result = (app()->make(ResetFertilizerSettingAction::class))->__invoke($request, $fertilizerSettingId);

        $this->assertSame( [],$result->fertilizerSettings->months);
        $this->assertSame( '',$result->fertilizerSettings->note);
        $this->assertSame( 0,$result->fertilizerSettings->fertilizerAmount);
        $this->assertSame( '',$result->fertilizerSettings->fertilizerName);
        $this->assertNotEquals($prevFertilizerSetting->getfertilizerNote()->getValue(),$result->fertilizerSettings->note);
    }
    public function test_存在しない肥料設定IDを入力するとエラーを返すこと()
    {
        $fertilizerSettingId = new Uuid();
        $request = ResetfertilizerSettingRequest::create('fertilizer/settings/reset', 'POST', []);
        $mockFertilizerSettingRepository = app()->make(MockfertilizerRepository::class);

        app()->bind(ResetfertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new ResetfertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $this->expectExceptionMessage('指定した肥料設定IDは見つかりませんでした (id:' . $fertilizerSettingId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(ResetfertilizerSettingAction::class))->__invoke($request, $fertilizerSettingId);
        $fertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingId($fertilizerSettingId));
    }
}