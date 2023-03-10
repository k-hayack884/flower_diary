<?php

namespace App\Packages\infrastructures\Plant;

use App\Packages\Domains\Plant\PlantData;
use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Models\Plant;
class PlantRepository implements PlantRepositoryInterface
{

    public function find(): array
    {
        return Plant::all();
    }

    public function findByName(string $name)
    {
       return Plant::where('name',$name)->get();

    }

    public function save(PlantData $plant): void
    {
        // TODO: Implement save() method.
    }

    public function delete(PlantData $plant): void
    {
        // TODO: Implement delete() method.
    }
}
