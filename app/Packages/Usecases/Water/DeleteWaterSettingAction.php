<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\DeleteWaterSettingRequest;
use PHPUnit\Exception;

class DeleteWaterSettingAction
{
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
     * @param string $waterSettingIdValue
     * @return void
     * @throws Exception
     */

    public function __invoke(
        DeleteWaterSettingRequest $deleteWaterSettingRequest,
        string                    $waterSettingIdValue
    ): void
    {
        try {
            $waterSettingId = new WaterSettingId($waterSettingIdValue);
            $waterSetting = $this->waterSettingRepository->findById($waterSettingId);
            $this->waterSettingRepository->delete($waterSetting);
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
