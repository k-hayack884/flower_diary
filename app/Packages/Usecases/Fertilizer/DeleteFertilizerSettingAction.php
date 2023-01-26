<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Water\FertilizerSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Fertilizer\DeleteFertilizerSettingRequest;
use PHPUnit\Exception;

class DeleteFertilizerSettingAction
{
    private FertilizerRepositoryInterface $fertilizerSettingRepository;

    /**
     * @param FertilizerRepositoryInterface $fertilizerSettingRepository
     */
    public function __construct(FertilizerRepositoryInterface $fertilizerSettingRepository)
    {
        $this->fertilizerSettingRepository = $fertilizerSettingRepository;
    }

    /**
     * @param DeleteFertilizerSettingRequest $deleteFertilizerSettingRequest
     * @param string $fertilizerSettingIdValue
     * @return void
     * @throws Exception
     */

    public function __invoke(
        DeleteFertilizerSettingRequest $deleteFertilizerSettingRequest,
        string                    $fertilizerSettingIdValue
    ): void
    {
        try {
            $fertilizerSettingId = new FertilizerSettingId($fertilizerSettingIdValue);
            $this->fertilizerSettingRepository->delete($fertilizerSettingId);
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
