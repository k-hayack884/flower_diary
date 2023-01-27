<?php

namespace App\Packages\Domains\CheckSeat;

use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Water\WaterSettingCollection;
use DomainException;
class CheckSeat
{
    private readonly CheckSeatId $checkSeatID;
    private WaterSettingCollection $waterSettingCollection;
    private FertilizerSettingCollection $fertilizerSettingCollection;

    public function __construct(
        CheckSeatId                 $waterCheckSeatID,
        WaterSettingCollection      $waterSettingCollection,
        FertilizerSettingCollection $fertilizerSettingCollection
    )
    {
        if ($waterSettingCollection->isEmpty() &&$fertilizerSettingCollection->isEmpty())
        {
            throw new DomainException("チェックシートを作成するには水やり設定か肥料設定のどちらかを作成する必要があります");
        }
        $this->checkSeatID = $waterCheckSeatID;
        $this->waterSettingCollection=$waterSettingCollection;
        $this->fertilizerSettingCollection=$fertilizerSettingCollection;
    }

    public function duplicationCheck(): void
    {

        if (!empty($this->waterSettingCollection->duplicationDisplay()->toArray())) {
            throw new DomainException('水やりの月が重複している設定があります');
        }
        if (!empty($this->fertilizerSettingCollection->duplicationDisplay()->toArray())) {
            throw new DomainException('同じ肥料の月が重複している設定があります');
        }
    }

    /**
     * @return CheckSeatId
     */
    public function getCheckSeatId(): CheckSeatId
    {
        return $this->checkSeatId;
    }

    /**
     * @return WaterSettingCollection
     */
    public function getWaterSettingCollection(): WaterSettingCollection
    {
        return $this->waterSettingCollection;
    }

    /**
     * @return FertilizerSettingCollection
     */
    public function getFertilizerSettingCollection(): FertilizerSettingCollection
    {
        return $this->fertilizerSettingCollection;
    }


}
