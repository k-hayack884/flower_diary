<?php

namespace App\Packages\Domains\CheckSeat;

use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Water\WaterSettingId;
use Carbon\Carbon;
use DomainException;

class CheckSeat
{
    /**
     * @var CheckSeatId
     * @var WaterSettingId[]
     * @var FertilizerSettingId[]
     *
     */
    private readonly CheckSeatId $checkSeatId;
    private array $waterSettingIds = [];
    private array $fertilizerSettingIds = [];
    private Carbon $createDate;

    /**
     * @param CheckSeatId $checkSeatId
     * @param WaterSettingId[] $waterSettingIds
     * @param FertilizerSettingId[] $fertilizerSettingIds
     */
    public function __construct(
        CheckSeatId $checkSeatId,
        array       $waterSettingIds,
        array       $fertilizerSettingIds
    )
    {
        if (empty($waterSettingIds) && empty($fertilizerSettingIds)) {
            throw new DomainException("チェックシートを作成するには水やり設定か肥料設定のどちらかを作成する必要があります");
        }
        $this->checkSeatId = $checkSeatId;
        $this->waterSettingIds = $waterSettingIds;
        $this->fertilizerSettingIds = $fertilizerSettingIds;
        $this->createDate=Carbon::now();
    }

    /**
     * @return CheckSeatId
     */
    public function getCheckSeatId(): CheckSeatId
    {
        return $this->checkSeatId;
    }

    /**
     * @return WaterSettingId[]
     */
    public function getWaterSettingIds(): array
    {
        return $this->waterSettingIds;
    }

    /**
     * @return FertilizerSettingId[]
     */
    public function getFertilizerSettingIds(): array
    {
        return $this->fertilizerSettingIds;
    }

    /**
     * @return Carbon
     */
    public function getCreateDate(): Carbon
    {
        return $this->createDate;
    }
}
