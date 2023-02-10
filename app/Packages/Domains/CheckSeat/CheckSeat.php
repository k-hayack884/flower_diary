<?php

namespace App\Packages\Domains\CheckSeat;
use DomainException;
class CheckSeat
{
    private readonly CheckSeatId $checkSeatID;
    private array  $waterSettingIds=[];
    private array $fertilizerSettingIds=[];

    public function __construct(
        CheckSeatId                 $waterCheckSeatID,
        array  $waterSettingIds,
        array $fertilizerSettingIds
    )
    {
        if (empty($waterSettingIds) &&empty($fertilizerSettingIds))
        {
            throw new DomainException("チェックシートを作成するには水やり設定か肥料設定のどちらかを作成する必要があります");
        }
        $this->checkSeatID = $waterCheckSeatID;
        $this->waterSettingIds=$waterSettingIds;
        $this->fertilizerSettingIds=$fertilizerSettingIds;

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
    public function getWaterSettingIds():array
    {
        return $this->waterSettingIds;
    }

    /**
     * @return array
     */
    public function getFertilizerSettingIds():array
    {
        return $this->fertilizerSettingIds;
    }
}
