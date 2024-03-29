<?php

namespace App\Packages\Usecases\Water;

use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WateringInterval;
use App\Packages\Domains\Water\WateringTimes;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;
use App\Packages\Domains\Water\WaterSettingRepositoryInterface;
use App\Packages\Presentations\Requests\Water\ResetWaterSettingRequest;
use App\Packages\Usecases\Dto\Water\WaterSettingWrapDto;
use Exception;
use Illuminate\Support\Facades\Log;


class ResetWaterSettingAction
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
     * @param ResetWaterSettingRequest $resetWaterSettingRequest
     * @return WaterSettingWrapDto
     */
    public function __invoke(
        ResetWaterSettingRequest $resetWaterSettingRequest,
    ): WaterSettingWrapDto
    {
        Log::info(__METHOD__, ['開始']);

        $waterSettingId = $resetWaterSettingRequest->getId();
        $checkSeatId=$resetWaterSettingRequest->getCheckSeatId();


        $waterSetting=$this->waterSettingRepository->findById(new WaterSettingId($waterSettingId));
        $resetMonths = MonthsWaterSetting::RESET;
        $resetNote = $waterSetting->getWaterNote()->update(null);
        $resetAmount = WaterAmount::settingModerateAmount();
        $resetWateringTimes = new WateringTimes(1);
        $resetWateringInterval = new WateringInterval(1);
        try {
            $resetWaterSetting =
                new MonthsWaterSetting(
                new WaterSettingId($waterSettingId),
                $resetMonths,
                $resetNote,
                $resetAmount,
                $resetWateringTimes,
                $resetWateringInterval,
            );
            $waterSettingCollection=new WaterSettingCollection();
            $waterSettingCollection->addSetting($resetWaterSetting);
            $this->waterSettingRepository->save($waterSettingCollection,$checkSeatId);
        } catch (\DomainException $e) {
            Log::error(__METHOD__, ['エラー']);
            abort(400,$e);
        } finally {
            Log::info(__METHOD__, ['エラー']);
        }
        return WaterSettingsDtoFactory::create($resetWaterSetting);
    }

}
