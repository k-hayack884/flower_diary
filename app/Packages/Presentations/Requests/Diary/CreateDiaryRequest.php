<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class CreateDiaryRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'diary.content' => [
                'required',
                'string',
                'max:200'
            ]
        ];
    }

    public function getDiaryContent()
    {
        return $this->diary['diary.content'];
    }

}
