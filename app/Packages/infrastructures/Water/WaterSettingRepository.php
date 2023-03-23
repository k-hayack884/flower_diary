<?php

namespace App\Packages\infrastructures\Water;

use App\Packages\Domains\Water\MonthsWaterSetting;
use App\Packages\Domains\Water\WaterSettingCollection;
use App\Packages\Domains\Water\WaterSettingId;

class WaterSettingRepository implements \App\Packages\Domains\Water\WaterSettingRepositoryInterface
{

    public function find(): array
    {
        // TODO: Implement find() method.
    }

    public function findById(WaterSettingId $waterSettingId): MonthsWaterSetting
    {
        // TODO: Implement findById() method.
    }

    public function save(WaterSettingCollection $waterSettingCollection): void
    {
        // TODO: Implement save() method.
    }

    public function delete(WaterSettingId $waterSettingId): void
    {
        // TODO: Implement delete() method.
    }
}
