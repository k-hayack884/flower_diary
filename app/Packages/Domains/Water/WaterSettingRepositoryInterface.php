<?php

namespace App\Packages\Domains\Water;

interface WaterSettingRepositoryInterface
{
    public function find():array;

    public function findById(WaterSettingId $waterSettingId):MonthsWaterSetting;

    public function save(WaterSettingCollection $waterSettingCollection):void;

    public function delete(WaterSettingId $waterSettingId):void;
}
