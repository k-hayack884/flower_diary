<?php

namespace App\Packages\Usecases\Dto\Diary;

class DiariesWrapDto
{
    /**
     * @param array $diaries
     */
    public function __construct(
        public array $diaries
    )
    {
    }
}
