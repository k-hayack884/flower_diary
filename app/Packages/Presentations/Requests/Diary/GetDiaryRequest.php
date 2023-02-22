<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class GetDiaryRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'diaryId' => [
                'required',
            ],
        ];

    }

    public function getId(): string
    {
        return $this->input('diaryId');
    }

}
