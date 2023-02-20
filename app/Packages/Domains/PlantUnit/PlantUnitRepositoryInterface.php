<?php

namespace App\Packages\Domains\PlantUnit;

interface PlantUnitRepositoryInterface
{
    public function find();

    public function findById(PlantUnitId $plantUnitId);

    public function save(PlantUnitCollection $plantUnit);

    public function delete(PlantUnitId $plantUnitId);
}
