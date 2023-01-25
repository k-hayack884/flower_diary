<?php

namespace App\Packages\Domains\Fertilizer;

interface FertilizerRepositoryInterface
{
    public function find();

    public function findById(FertilizerSettingID $fertilizerSettingId);

    public function save(TarmFertilizerSetting $fertilizerSetting);

    public function delete(TarmFertilizerSetting $fertilizerSetting);
}
