<?php

namespace App\Packages\Usecases\Plant;

use App\Http\Services\Base64Service;
use App\Packages\Domains\Plant\PlantData;
use App\Packages\Domains\Plant\PlantImages;
use App\Packages\Usecases\Dto\Plant\PlantDto;
use App\Packages\Usecases\Dto\Plant\PlantWrapDto;


class PlantDtoFactory
{
    public static function create(PlantData $plantData,PlantImages $plantImages): PlantWrapDto
    {
        $plantImageData1 = $plantImages->getPlantImage1();
        $plantImage1 = Base64Service::base64FileEncode($plantImageData1, 'plantImage');
        $plantImageData2 = $plantImages->getPlantImage2();
        $plantImage2 = Base64Service::base64FileEncode($plantImageData2, 'plantImage');
        $plantImageData3 = $plantImages->getPlantImage3();
        $plantImage3 = Base64Service::base64FileEncode($plantImageData3, 'plantImage');
        $plantImageData4 = $plantImages->getPlantImage4();
        $plantImage4 = Base64Service::base64FileEncode($plantImageData4, 'plantImage');
        $plantImageData5 = $plantImages->getPlantImage5();
        $plantImage5 = Base64Service::base64FileEncode($plantImageData5, 'plantImage');
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
                $plantImage1,
                $plantImage2,
                $plantImage3,
                $plantImage4,
                $plantImage5,
            )
        );
    }
}
