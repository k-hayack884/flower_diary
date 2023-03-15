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
            'plantUnitUserId' => [
                'required'
            ],
            'plantUnitPlantId' => [
                'required'
            ],
        ];
    }

    public function getPlantId():string
    {
        return $this->input('plantId');
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
