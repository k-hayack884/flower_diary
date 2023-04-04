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
            'plantUnitId'=>[
                'required'
            ],
            'diaryContent' => [
                'required',
                'string',
                'max:200'
            ],
            'plantImage' => [
                'file_base64' => 'required_without:file|string'
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
    public function getPlantImage():string
    {
        return $this->input('plantImage');
    }


}
