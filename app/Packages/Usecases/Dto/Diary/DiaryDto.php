<?php

namespace App\Packages\Usecases\Dto\Diary;

class DiaryDto
{
    public function __construct(
        public string $diaryId,
        public string $content,
        public array  $comments,
        public string    $createDate,
    )
    {
    }
}
