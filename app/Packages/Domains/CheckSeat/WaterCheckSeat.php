<?php

namespace App\Packages\Domains\CheckSeat;

use App\Packages\Domains\Water\TarmWaterSetting;
use App\Packages\Domains\Water\WaterAmount;
use App\Packages\Domains\Water\WaterAmountNote;
use App\Packages\Domains\Water\WaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingID;

class WaterCheckSeat
{
    private readonly WaterCheckSeatID $checkSeatID;
    private WaterSettingCollection $waterSettingCollection;

    public function __construct(WaterCheckSeatID $waterCheckSeatID,WaterSettingCollection $waterSettingCollection)
    {
        $this->checkSeatID=$waterCheckSeatID;
        $this->waterSettingCollection = $waterSettingCollection;
    }
    public function delete(string $waterSettingId){
        $deleteId=new WaterSettingID($waterSettingId);
        $hige=$this->waterSettingCollection->find($deleteId);
        $this->waterSettingCollection->delete($hige);
    }

}
