<?php

namespace App\Packages\Usecases\PlantUnit;

use App\Packages\Domains\PlantUnit\PlantUnit;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitDto;
use App\Packages\Usecases\Dto\PlantUnit\PlantUnitWrapDto;

class PlantUnitDtoFactory
{
    public static function create(PlantUnit $plantUnit): PlantUnitWrapDto
    {
        return new PlantUnitWrapDto(
            new PlantUnitDto(
                $plantUnit->getPlantUnitId()->getId(),
                $plantUnit->getPlantId()->getId(),
                $plantUnit->getUserId()->getId(),
                $plantUnit->getCheckSeatId()->getId(),
                $plantUnit->getPlantName()->getValue(),
                $plantUnit->getDiaries(),
                $plantUnit->getCreateDate()->format('Y/m/d'),
                $plantUnit->getUpdateDate()->format('Y/m/d'),
            )
        );
    }
}
