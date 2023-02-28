<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\DeleteWaterSettingRequest;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class DeleteWaterSettingAction
{
    /**
     * @var WaterSettingRepositoryInterface
     */
    private WaterSettingRepositoryInterface $waterSettingRepository;

    /**
     * @param WaterSettingRepositoryInterface $waterSettingRepository
     */
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    /**
     * @param DeleteWaterSettingRequest $deleteWaterSettingRequest
     * @return void
     * @throws Exception
     */

    public function __invoke(
        DeleteWaterSettingRequest $deleteWaterSettingRequest,
    ): void
    {
        Log::info(__METHOD__, ['開始']);

        $waterSettingId=new WaterSettingId($deleteWaterSettingRequest->getId());
        try {
            $waterSetting=$this->waterSettingRepository->findById($waterSettingId);
            $this->waterSettingRepository->delete($waterSetting->getWaterSettingId());
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['終了']);
        }
    }
}
