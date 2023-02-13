<?php

namespace App\Packages\Domains\CheckSeat;

use Carbon\Carbon;
use DomainException;

class CheckSeat
{
    private readonly CheckSeatId $checkSeatID;
    private array $waterSettingIds = [];
    private array $fertilizerSettingIds = [];
    private Carbon $createDate;

    public function __construct(
        CheckSeatId $waterCheckSeatID,
        array       $waterSettingIds,
        array       $fertilizerSettingIds
    )
    {
        if (empty($waterSettingIds) && empty($fertilizerSettingIds)) {
            throw new DomainException("チェックシートを作成するには水やり設定か肥料設定のどちらかを作成する必要があります");
        }
        $this->checkSeatID = $waterCheckSeatID;
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
     * @return array
     */
    public function getWaterSettingIds(): array
    {
        return $this->waterSettingIds;
    }

    /**
     * @return array
     */
    public function getFertilizerSettingIds(): array
    {
        return $this->fertilizerSettingIds;
    }

    public function getCreateDate(): Carbon
    {
        return $this->createDate;
    }
}
