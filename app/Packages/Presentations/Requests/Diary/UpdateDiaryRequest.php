<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class UpdateDiaryRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'diary.content' => [
                'required',
                'string',
                'max:200'
            ],
            'diary.comments' => [
                'array',
            ],
        ];

    }

    public function getDiaryContent()
    {
        return $this->diary['diary.content'];
    }
    public function getComments()
    {
        return $this->diary['diary.comments'];
    }
}
