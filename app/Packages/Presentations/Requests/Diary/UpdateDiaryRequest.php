<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class UpdateDiaryRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'diaryId'=>[
                'required'
            ],
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

    public function getId()
    {
        return $this->input('diaryId');
    }
    public function getDiaryContent()
    {
        return $this->input('diaryContent');
    }
    public function getComments()
    {
        return $this->input('diaryComments');
    }


}
