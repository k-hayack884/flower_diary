<?php

namespace App\Packages\Domains\PlantUnit;

use App\Packages\Domains\User\UserId;

interface PlantUnitRepositoryInterface
{
    public function find():array;

    public function findByUserId(UserId $userId):array;
    public function findById(PlantUnitId $plantUnitId):PlantUnit;

    public function save(PlantUnitCollection $plantUnit):void;
    public function delete(PlantUnitId $plantUnitId):void;
}
