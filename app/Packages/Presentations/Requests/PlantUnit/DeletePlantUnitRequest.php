<?php

namespace App\Packages\Presentations\Requests\PlantUnit;

class DeletePlantUnitRequest extends \App\Http\Requests\BaseRequest
{
    public function rules(): array
    {
        return ['plantUnitId'=>[
            'required'
        ]];
    }
    public function getId():string
    {
        return $this->input('plantUnitId');
    }
}
