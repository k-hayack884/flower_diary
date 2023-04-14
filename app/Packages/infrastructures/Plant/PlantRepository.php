<?php

namespace App\Packages\infrastructures\Plant;

use App\Packages\Domains\Plant\PlantData;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\Plant\PlantRepositoryInterface;
use App\Models\Plant;
class PlantRepository implements PlantRepositoryInterface
{

    public function find(): array
    {
        return Plant::all();
    }

    public function findById(PlantId $plantId)
    {
        $plant=Plant::where('id',$plantId)->first();
        return new PlantData(
        $plant->id,
        $plant->name,
        $plant->scientific,
        $plant->information,
        $plant->recommendSpringWaterInterval,
        $plant->recommendSpringWaterTimes,
        $plant->recommendSummerWaterInterval,
        $plant->recommendSummerWaterTimes,
        $plant->recommendAutumnWaterInterval,
        $plant->recommendAutumnWaterTimes,
        $plant->recommendWinterWaterInterval,
        $plant->recommendWinterWaterTimes,
        $plant->fertilizerName,
        json_decode($plant->fertilizerMonths)
    );
    }
    public function findPlantNameById(PlantId $plantId)
    {
        $hitPlantName= Plant::where('id',$plantId)->first('name');
        return $hitPlantName->name;
    }


    public function findByName(string $name): PlantData
    {
      $plant= Plant::where('name',$name)->first();
      return new PlantData(
          $plant->id,
          $plant->name,
          $plant->scientific,
          $plant->information,
          $plant->recommendSpringWaterInterval,
          $plant->recommendSpringWaterTimes,
          $plant->recommendSummerWaterInterval,
          $plant->recommendSummerWaterTimes,
          $plant->recommendAutumnWaterInterval,
          $plant->recommendAutumnWaterTimes,
          $plant->recommendWinterWaterInterval,
          $plant->recommendWinterWaterTimes,
          $plant->fertilizerName,
          json_decode($plant->fertilizerMonths)
      );
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
