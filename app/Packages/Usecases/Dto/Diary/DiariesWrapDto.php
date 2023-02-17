<?php

namespace App\Packages\Usecases\Dto\Diary;

class DiariesWrapDto
{
    public function __construct(
        public array $diaries
    )
    {
    }
}
