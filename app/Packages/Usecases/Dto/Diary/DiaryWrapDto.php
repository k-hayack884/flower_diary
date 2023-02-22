<?php

namespace App\Packages\Usecases\Dto\Diary;

class DiaryWrapDto
{
    /**
     * @param DiaryDto $diary
     */
    public function __construct(
        public DiaryDto $diary
    )
    {
    }
}
