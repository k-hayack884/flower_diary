<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class GetDiaryRequest extends BaseRequest //GETはRequestを継承
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [];

    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->input('diaryId');
    }
}
