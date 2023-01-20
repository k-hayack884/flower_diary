<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\WaterSettingID;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\DeleteWaterSettingRequest;
use PHPUnit\Exception;

class DeleteWaterSettingAction
{
    public function __construct(WaterSettingRepositoryInterface $waterSettingRepository)
    {
        $this->waterSettingRepository = $waterSettingRepository;
    }

    public function __invoke(
        DeleteWaterSettingRequest $deleteWaterSettingRequest,
        string                    $waterSettingIdValue
    ): void
    {
        try {
            $waterSettingId = new WaterSettingID($waterSettingIdValue);
            $waterSetting = $this->waterSettingRepository->findById($waterSettingId);
            $this->waterSettingRepository->delete($waterSettingId);
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
