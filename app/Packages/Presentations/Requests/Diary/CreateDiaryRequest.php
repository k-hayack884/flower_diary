<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;
use App\Rules\FileBase64;

class CreateDiaryRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'plantUnitId'=>[
                'required'
            ],
            'diaryContent' => [
                'required',
                'string',
                'max:200'
            ],
            'plantImage' => [
                'nullable',
                new FileBase64(),
                ]
        ];
    }
    /**
     * @return string
     */
    public function getPlantUnitId():string
    {
        return $this->input('plantUnitId');
    }
    /**
     * @return string
     */
    public function getDiaryContent():string
    {
        return $this->input('diaryContent');
    }

    /**
     * @return string|null
     */
    public function getPlantImage():string|null
    {
        return $this->input('plantImage');
    }


}
