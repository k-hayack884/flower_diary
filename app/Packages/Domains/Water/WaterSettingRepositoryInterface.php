<?php

namespace App\Packages\Domains\Water;

interface WaterSettingRepositoryInterface
{
    public function find();

    public function findById(WaterSettingID $waterSettingId);

    public function save(TarmWaterSetting $waterSetting);

    public function delete(TarmWaterSetting $waterSetting);
}
