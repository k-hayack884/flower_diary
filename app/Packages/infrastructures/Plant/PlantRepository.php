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
            ->get();
        $plant_images = $plant->pluck('plant_images')->toArray();
        shuffle($plant_images);
        $randomPlantImages = array_slice($plant_images, 0, 5);
        return new PlantData(
            new PlantId($plant[0]->id),
            $plant[0]->name,
            $plant[0]->scientific,
            $plant[0]->information,
            $plant[0]->recommendSpringWaterInterval,
            $plant[0]->recommendSpringWaterTimes,
            $plant[0]->recommendSummerWaterInterval,
            $plant[0]->recommendSummerWaterTimes,
            $plant[0]->recommendAutumnWaterInterval,
            $plant[0]->recommendAutumnWaterTimes,
            $plant[0]->recommendWinterWaterInterval,
            $plant[0]->recommendWinterWaterTimes,
            $plant[0]->fertilizerName,
            json_decode($plant[0]->fertilizerMonths),
            new PlantImages(new PlantId($plant[0]->id),$randomPlantImages)
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
            ->get();
        $plant_images = $plant->pluck('plant_images')->toArray();
        shuffle($plant_images);
        $randomPlantImages = array_slice($plant_images, 0, 5);
        return new PlantData(
            new PlantId($plant[0]->id),
            $plant[0]->name,
            $plant[0]->scientific,
            $plant[0]->information,
            $plant[0]->recommendSpringWaterInterval,
            $plant[0]->recommendSpringWaterTimes,
            $plant[0]->recommendSummerWaterInterval,
            $plant[0]->recommendSummerWaterTimes,
            $plant[0]->recommendAutumnWaterInterval,
            $plant[0]->recommendAutumnWaterTimes,
            $plant[0]->recommendWinterWaterInterval,
            $plant[0]->recommendWinterWaterTimes,
            $plant[0]->fertilizerName,
            json_decode($plant[0]->fertilizerMonths),
            new PlantImages(new PlantId($plant[0]->id),$randomPlantImages)
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

    public function save(PlantData $plant): void
    {
        // TODO: Implement save() method.
    }

    public function delete(PlantData $plant): void
    {
        // TODO: Implement delete() method.
    }
}
