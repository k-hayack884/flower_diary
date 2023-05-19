<?php

namespace App\Packages\Usecases\Plant;

use App\Http\Services\Base64Service;
use App\Packages\Domains\Plant\PlantData;
use App\Packages\Domains\Plant\PlantImages;
use App\Packages\Usecases\Dto\Plant\PlantDto;
use App\Packages\Usecases\Dto\Plant\PlantWrapDto;


class PlantDtoFactory
{
    public static function create(PlantData $plantData): PlantWrapDto
    {
        $plantImages=[];
        foreach ($plantData->getPlantImages()->getPlantImages() as $imageData){
            $plantImages[]=Base64Service::base64FileEncode($imageData, 'plantImage');
        }
        return new PlantWrapDto(
            new PlantDto(
                $plantData->getPlantId(),
                $plantData->getName(),
                $plantData->getScientific(),
                $plantData->getInformation(),
                $plantData->getRecommendSpringWaterInterval(),
                $plantData->getRecommendSpringWaterTimes(),
                $plantData->getRecommendSummerWaterInterval(),
                $plantData->getRecommendSummerWaterTimes(),
                $plantData->getRecommendAutumnWaterInterval(),
                $plantData->getRecommendAutumnWaterTimes(),
                $plantData->getRecommendWinterWaterInterval(),
                $plantData->getRecommendWinterWaterInterval(),
                $plantData->getFertilizerName(),
                $plantData->getFertilizerMonths(),
                $plantImages,
            )
        );
    }
}
