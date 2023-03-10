<?php

namespace App\Packages\Usecases\Plant;

use App\Packages\Domains\Plant\PlantData;
use App\Packages\Usecases\Dto\Plant\PlantDto;
use App\Packages\Usecases\Dto\Plant\PlantWrapDto;


class PlantDtoFactory
{
    public static function create(PlantData $plantData): PlantWrapDto
    {
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
            )
        );
    }
}
