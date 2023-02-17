<?php

namespace App\Packages\Usecases\Diary;

use App\Packages\Domains\Diary\Diary;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;

class DiaryDtoFactory
{
    public static function create(Diary $diary): DiaryWrapDto
    {
        return new DiaryWrapDto(
            new DiaryDto(
                $diary->getDiaryId()->getId(),
                $diary->getDiaryContent()->getValue(),
                $diary->getComments(),
                $diary->getCreateDate()->format('Y/m/d'),
            )
        );
    }
}
