<?php

namespace App\Packages\Usecases\Dto\Diary;

class DiaryWrapDto
{
    public function __construct(
        public DiaryDto $diaries
    )
    {
    }
}
