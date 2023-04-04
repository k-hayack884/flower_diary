<?php

namespace App\Packages\Domains\Diary;

use App\Packages\Domains\PlantUnit\PlantUnitImage;

class DiaryImage
{
    private string $diaryFile;

    public function __construct(string|null $diaryFile = null)
    {
        if ($diaryFile === null) {
            $this->diaryFile = '';
        }
        $this->diaryFile = $diaryFile;
    }

    /**
     * @param string|null $diaryFile
     * @return DiaryImage
     */
    public function update(string|null $diaryFile = null): DiaryImage
    {
        if ($diaryFile === null) {
            $this->diaryFile = '';
        }
        return new self($diaryFile);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->diaryFile;
    }
}
