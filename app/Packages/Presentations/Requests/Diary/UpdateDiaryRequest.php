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
    public function getDiaryContent()
    {
        return $this->input('diaryContent');
    }

    /**
     * @return string
     */
    public function getComments():string
    {
        return $this->input('diaryComments');
    }


}
