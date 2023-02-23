<?php

namespace App\Packages\Usecases\Dto\Diary;

class DiaryDto
{
    /**
     * @param string $diaryId
     * @param string $content
     * @param array $comments
     * @param string $createDate
     */
    public function __construct(
        public string $diaryId,
        public string $content,
        public array  $comments,
        public string    $createDate,
    )
    {
    }
}
