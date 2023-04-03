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
            'userId' => [
                'required'
            ],
            'plantId' => [
                'required'
            ],
            'plantImage' => [

            ]

        ];
    }

    /**
     * @return string
     */

    public function getPlantId():string
    {
        return $this->input('plantId');
    }

    /**
     * @return string
     */
    public function getPlantUnitPlantId():string
    {
        return $this->input('plantId');
    }

    /**
     * @return string
     */
    public function getPlantUnitUserId():string
    {
        return $this->input('userId');
    }

}
