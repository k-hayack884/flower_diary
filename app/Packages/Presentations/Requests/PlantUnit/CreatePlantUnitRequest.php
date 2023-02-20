<?php

namespace App\Packages\Presentations\Requests\PlantUnit;

use App\Http\Requests\BaseRequest;

class
CreatePlantUnitRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'plantUnitPlantId' => [
                'required'
            ],
            'plantUnitUserId' => [
                'required'
            ],
        ];
    }
    public function getPlantUnitPlantId():string
    {
        return $this->input('plantUnitPlantId');
    }
    public function getPlantUnitUserId():string
    {
        return $this->input('plantUnitUserId');
    }

}
