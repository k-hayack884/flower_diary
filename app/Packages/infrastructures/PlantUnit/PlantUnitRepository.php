<?php

namespace App\Packages\infrastructures\PlantUnit;

use App\Models\Plant;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Domains\PlantUnit\PlantUnitCollection;
use App\Packages\Domains\PlantUnit\PlantUnitId;
use App\Packages\Domains\PlantUnit\PlantUnitRepositoryInterface;

class PlantUnitRepository implements PlantUnitRepositoryInterface
{

    public function find(): array
    {
        // TODO: Implement find() method.
        return \App\Models\PlantUnit::all();
    }

    public function findById(PlantUnitId $plantUnitId): PlantUnit
    {
        return \App\Models\PlantUnit::all();

    }

    public function save(PlantUnitCollection $plantUnit): void
    {
        $collectionArray = $plantUnit->toArray();

        foreach ($collectionArray as $plant){

$diaryJson=json_encode($plant->getDiaries());
            \App\Models\PlantUnit::create([
                'plant_unit_id'=>$plant->getPlantUnitId()->getId(),
                'user_id'=>$plant->getUserId()->getId(),
                'plant_id'=>$plant->getPlantId()->getId(),
                'check_seat_id'=>$plant->getCheckSeatId()->getId(),
                'plant_name'=>$plant->getPlantName()->getValue(),
                'diaries'=>$diaryJson,
                'create_date'=>$plant->getCreateDate()->format('Y/m/d'),
                'update_date'=>$plant->getUpdateDate()->format('Y/m/d'),
            ]);
        }
    }

    public function delete(PlantUnitId $plantUnitId): void
    {
        // TODO: Implement delete() method.
    }
}
