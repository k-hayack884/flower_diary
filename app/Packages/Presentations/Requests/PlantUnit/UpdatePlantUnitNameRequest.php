<?php

namespace App\Packages\Presentations\Requests\PlantUnit;

use App\Http\Requests\BaseRequest;

class
UpdatePlantUnitNameRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'plantName' => [
                'nullable',
                'max:20'
            ],
            'plantId' => [
                'required'
            ],

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

    public function getPlantId():string
    {
        return $this->input('plantId');
    }

    /**
     * @return string|null
     */
    public function getPlantName():string|null
    {
        return $this->input('plantName');
    }

}
