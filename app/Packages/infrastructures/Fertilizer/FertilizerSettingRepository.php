<?php

namespace App\Packages\infrastructures\Fertilizer;

use App\Packages\Domains\Fertilizer\FertilizerSettingCollection;
use App\Packages\Domains\Fertilizer\FertilizerSettingId;
use App\Packages\Domains\Fertilizer\MonthsFertilizerSetting;

class FertilizerSettingRepository implements \App\Packages\Domains\Fertilizer\FertilizerRepositoryInterface
{

    public function find(): array
    {
        // TODO: Implement find() method.
    }

    public function findById(FertilizerSettingId $fertilizerSettingId): MonthsFertilizerSetting
    {
        // TODO: Implement findById() method.
    }

    public function save(FertilizerSettingCollection $fertilizerSetting): void
    {
        // TODO: Implement save() method.
    }

    public function delete(FertilizerSettingId $fertilizerSettingId): void
    {
        // TODO: Implement delete() method.
    }
}
