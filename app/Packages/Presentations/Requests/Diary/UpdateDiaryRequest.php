<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class UpdateDiaryRequest extends BaseRequest
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
            ],
        ];
    }

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('diaryId');
    }

    /**
     * @return mixed
     */
    public function getDiaryContent(): mixed
    {
        return $this->input('diaryContent');
    }


}
