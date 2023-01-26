<?php

namespace App\Packages\Domains\Water;

interface WaterSettingRepositoryInterface
{
    public function find();

    public function findById(WaterSettingId $waterSettingId);

    public function save(WaterSettingCollection $waterSettingCollection);

    public function delete(WaterSettingId $waterSettingId);
}
