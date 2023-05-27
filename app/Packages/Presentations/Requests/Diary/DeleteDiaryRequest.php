<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class DeleteDiaryRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules():array
    {
        return [
            'plantUnitId'=>[
                'required'
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
    public function getPlantUnitId():string
    {
        return $this->input('plantUnitId');
    }
}
