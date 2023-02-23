<?php

namespace App\Packages\Usecases\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Water\FertilizerSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Fertilizer\DeleteFertilizerSettingRequest;
use PHPUnit\Exception;

class DeleteFertilizerSettingAction
{
    /**
     * @var FertilizerRepositoryInterface
     */
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
     * @return void
     * @throws Exception
     */

    public function __invoke(
        DeleteFertilizerSettingRequest $deleteFertilizerSettingRequest,
    ): void
    {
        $fertilizerSettingId=new FertilizerSettingId($deleteFertilizerSettingRequest->getId());

        try {
            $fertilizerSetting=$this->fertilizerSettingRepository->findById($fertilizerSettingId);
            $this->fertilizerSettingRepository->delete($fertilizerSetting->getFertilizerSettingId());
        } catch (Exception $e) {
            throw  $e;
        }
    }
}
