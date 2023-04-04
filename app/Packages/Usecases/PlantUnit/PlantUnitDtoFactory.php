<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Http\Services\Base64Service;
use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitDto;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;

class PlantUnitDtoFactory
{
    /**
     * @param PlantUnit $plantUnit
     * @return PlantUnitWrapDto
     */
    public static function create(PlantUnit $plantUnit): PlantUnitWrapDto
    {
        $plantImageData= $plantUnit->getPlantImage()->getValue();
        $plantImage=Base64Service::base64FileEncode($plantImageData,'plantUnitImage');
        return new PlantUnitWrapDto(
            new PlantUnitDto(
                $plantUnit->getPlantUnitId()->getId(),
                $plantUnit->getPlantId()->getId(),
                $plantUnit->getUserId()->getId(),
                $plantUnit->getCheckSeatId()->getId(),
                $plantUnit->getPlantName()->getValue(),
                $plantImage,
                $plantUnit->getDiaries(),
                $plantUnit->getCreateDate()->format('Y/m/d'),
                $plantUnit->getUpdateDate()->format('Y/m/d'),
            )
        );
    }
}
