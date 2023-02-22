<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class DeleteDiaryRequest extends BaseRequest
{
    public function rules():array
    {
        return [
            'diaryId' => [
                'required',
            ],
        ];
    }
    public function getId()
    {
        return $this->input('diaryId');
    }
}
