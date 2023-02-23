<?php

namespace App\Packages\Domains\PlantUnit;

interface PlantUnitRepositoryInterface
{
    public function find():array;

    public function findById(PlantUnitId $plantUnitId):PlantUnit;

    public function save(PlantUnitCollection $plantUnit):void;

    public function delete(PlantUnitId $plantUnitId):void;
}
