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
        try {
            $fertilizerSettingId=$deleteFertilizerSettingRequest->getId();
            $fertilizerSetting=$this->fertilizerSettingRepository->findById(new FertilizerSettingId($fertilizerSettingId));
            $this->fertilizerSettingRepository->delete($fertilizerSetting->getFertilizerSettingId());
        } catch (\DomainException $e) {
            abort(400,$e);
        }
    }
}
