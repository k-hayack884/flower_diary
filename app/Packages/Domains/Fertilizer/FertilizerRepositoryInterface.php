<?php

namespace App\Packages\Domains\Fertilizer;

interface FertilizerRepositoryInterface
{
    public function find();

    public function findById(FertilizerSettingId $fertilizerSettingId);

    public function save(FertilizerSettingCollection $fertilizerSetting);

    public function delete(FertilizerSettingId $fertilizerSettingId);
}
