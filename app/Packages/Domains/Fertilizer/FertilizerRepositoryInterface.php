<?php

namespace App\Packages\Domains\Fertilizer;

interface FertilizerRepositoryInterface
{
    public function find();

    public function findById(FertilizerSettingID $fertilizerSettingId);

    public function save(FertilizerSettingCollection $fertilizerSetting);

    public function delete(FertilizerSettingID $fertilizerSettingId);
}
