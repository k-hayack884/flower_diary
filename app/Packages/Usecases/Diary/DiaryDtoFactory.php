<?php

namespace App\Packages\Usecases\Diary;

use App\Http\Services\Base64Service;
use App\Packages\Domains\Diary\Diary;
use App\Packages\Usecases\Dto\Diary\DiaryDto;
use App\Packages\Usecases\Dto\Diary\DiaryWrapDto;

class DiaryDtoFactory
{
    /**
     * @param Diary $diary
     * @return DiaryWrapDto
     */
    public static function create(Diary $diary): DiaryWrapDto
    {
        $diaryImageData = $diary->getDiaryImage()->getValue();
        $diaryImage = Base64Service::base64FileEncode($diaryImageData, 'plantUnitImage');
        return new DiaryWrapDto(
            new DiaryDto(
                $diary->getDiaryId()->getId(),
                $diary->getDiaryContent()->getValue(),
                $diaryImage,
                $diary->getComments(),
                $diary->getCreateDate()->format('Y/m/d'),
            )
        );
    }
}
