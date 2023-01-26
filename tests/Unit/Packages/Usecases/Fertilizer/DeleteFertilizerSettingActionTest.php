<?php

namespace Packages\Usecases\Fertilizer;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Fertilizer\FertilizerSettingID;
use App\Packages\Domains\Shared\Uuid;
use App\Packages\infrastructures\Fertilizer\MockFertilizerRepository;
use App\Packages\Presentations\Requests\Fertilizer\DeleteFertilizerSettingRequest;
use App\Packages\Usecases\Fertilizer\DeleteFertilizerSettingAction;
use PHPUnit\Framework\TestCase;

class DeleteFertilizerSettingActionTest extends TestCase
{
    public function test_指定した水やり設定が削除されていること()
    {
        $fertilizerSettingId = '983c1092-7a0d-40b0-af6e-30bff5975e31';
        $request = DeleteFertilizerSettingRequest::create('fertilizer/settings', 'DELETE', []);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(DeleteFertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new DeleteFertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $this->expectExceptionMessage('選んだ設定が見つかりませんでした (id:' . $fertilizerSettingId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteFertilizerSettingAction::class))->__invoke($request, $fertilizerSettingId);
        $fertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingID($fertilizerSettingId));
    }

    public function test_存在しない水やり設定IDを入力するとエラーを返すこと()
    {
        $fertilizerSettingId = new Uuid();
        $request = DeleteFertilizerSettingRequest::create('water/settings', 'DELETE', []);
        $mockFertilizerSettingRepository = app()->make(MockFertilizerRepository::class);

        app()->bind(DeleteFertilizerSettingAction::class, function () use (
            $mockFertilizerSettingRepository
        ) {
            return new DeleteFertilizerSettingAction(
                $mockFertilizerSettingRepository
            );
        });
        $this->expectExceptionMessage('選んだ設定が見つかりませんでした (id:' . $fertilizerSettingId . ')');
        $this->expectException(NotFoundException::class);
        $result = (app()->make(DeleteFertilizerSettingAction::class))->__invoke($request, $fertilizerSettingId);
        $fertilizerSetting = $mockFertilizerSettingRepository->findById(new FertilizerSettingID($fertilizerSettingId));
    }
}
