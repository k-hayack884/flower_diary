<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class GetDiaryRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'diaryId' => [
                'required',
            ],
        ];

    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->input('diaryId');
    }
}
