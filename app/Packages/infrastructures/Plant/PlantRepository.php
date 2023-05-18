<?php

namespace App\Packages\infrastructures\Plant;

use App\Models\PlantImage;
use App\Packages\Domains\Plant\PlantData;
use App\Packages\Domains\Plant\PlantId;
use App\Packages\Domains\Plant\PlantImages;
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
        $plant = Plant::join('plant_images', 'plants.id', '=', 'plant_images.plant_id')
            ->where('plants.id', $plantId->getId())
            ->select('plants.id', 'plants.name', 'plants.scientific', 'plants.information', 'plants.recommendSpringWaterInterval', 'plants.recommendSpringWaterTimes', 'plants.recommendSummerWaterInterval', 'plants.recommendSummerWaterTimes',
                'plants.recommendAutumnWaterInterval', 'plants.recommendAutumnWaterTimes', 'plants.recommendWinterWaterInterval', 'plants.recommendWinterWaterTimes', 'plants.fertilizerName', 'plants.fertilizerMonths', 'plant_images.plant_images')
            ->first();

        return new PlantData(
            new PlantId($plant->id),
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
            json_decode($plant->fertilizerMonths),
            new PlantImages($plant->id, json_decode($plant->plant_images))
        );
    }

    public function findPlantNameById(PlantId $plantId)
    {
        $hitPlantName = Plant::where('id', $plantId)->first('name');
        return $hitPlantName->name;
    }


    public function findByName(string $name): PlantData
    {
        $plant = Plant::join('plant_images', 'plants.id', '=', 'plant_images.plant_id')
            ->where('plants.name', $name)
            ->select('plants.id', 'plants.name', 'plants.scientific', 'plants.information', 'plants.recommendSpringWaterInterval', 'plants.recommendSpringWaterTimes', 'plants.recommendSummerWaterInterval', 'plants.recommendSummerWaterTimes',
                'plants.recommendAutumnWaterInterval', 'plants.recommendAutumnWaterTimes', 'plants.recommendWinterWaterInterval', 'plants.recommendWinterWaterTimes', 'plants.fertilizerName', 'plants.fertilizerMonths', 'plant_images.plant_images')
            ->first();

        return new PlantData(
            new PlantId($plant->id),
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
            json_decode($plant->fertilizerMonths),
            new PlantImages(new PlantId($plant->id), json_decode($plant->plant_images))
        );
    }

    public function addImage(PlantImages $plantImages): void
    {
        foreach ($plantImages->getPlantImages() as $image){
            PlantImage::create([
                'plant_id' => $plantImages->getPlantId()->getId(),
                'plant_images' => $image
            ]);
        }

    }

    public function findImage(PlantId $plantId): PlantImages
    {
        $hitPlant = Plant::where('id', $plantId->getId())->first();

        return new PlantImages(
            new PlantId($hitPlant->id),
            $hitPlant->image1,
            $hitPlant->image2,
            $hitPlant->image3,
            $hitPlant->image4,
            $hitPlant->image5,
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
