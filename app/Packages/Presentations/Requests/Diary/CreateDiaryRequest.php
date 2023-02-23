<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class CreateDiaryRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'diaryContent' => [
                'required',
                'string',
                'max:200'
            ]
        ];
    }

    /**
     * @return string
     */
    public function getDiaryContent():string
    {
        return $this->input('diaryContent');
    }

}
