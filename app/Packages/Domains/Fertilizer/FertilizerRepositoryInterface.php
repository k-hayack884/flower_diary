<?php

namespace App\Packages\Domains\Fertilizer;

interface FertilizerRepositoryInterface
{
    public function find():array;

    public function findById(FertilizerSettingId $fertilizerSettingId):MonthsFertilizerSetting;

    public function save(FertilizerSettingCollection $fertilizerSetting):void;

    public function delete(FertilizerSettingId $fertilizerSettingId):void;
}
