<?php

namespace App\Packages\Domains\Fertilizer;

use App\Packages\Domains\CheckSeat\CheckSeatId;

interface FertilizerRepositoryInterface
{
    public function find():array;
    public function findByCheckSeatId(CheckSeatId $checkSeatId):array;

    public function findById(FertilizerSettingId $fertilizerSettingId):MonthsFertilizerSetting;

    public function save(FertilizerSettingCollection $fertilizerSetting,string $checkSeatId):void;

    public function delete(FertilizerSettingId $fertilizerSettingId):void;
}
