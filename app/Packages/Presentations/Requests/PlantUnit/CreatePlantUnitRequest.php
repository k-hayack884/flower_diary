<?php

namespace App\Packages\Presentations\Requests\PlantUnit;

use App\Http\Requests\BaseRequest;

class
CreatePlantUnitRequest extends BaseRequest
{
    /**
     * @return array[]
     */
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

    /**
     * @return string
     */
    public function getPlantUnitPlantId():string
    {
        return $this->input('plantUnitPlantId');
    }

    /**
     * @return string
     */
    public function getPlantUnitUserId():string
    {
        return $this->input('plantUnitUserId');
    }

}
