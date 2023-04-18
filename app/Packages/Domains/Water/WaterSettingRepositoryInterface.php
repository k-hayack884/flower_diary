<?php

namespace App\Packages\Domains\Water;

use App\Packages\Domains\CheckSeat\CheckSeatId;

interface WaterSettingRepositoryInterface
{
    public function find():array;

    public function findByCheckSeatId(CheckSeatId $checkSeatId):array;

    public function findById(WaterSettingId $waterSettingId):MonthsWaterSetting;

    public function save(WaterSettingCollection $waterSetting,string $checkSeatId):void;

    public function delete(WaterSettingId $waterSettingId):void;
}
