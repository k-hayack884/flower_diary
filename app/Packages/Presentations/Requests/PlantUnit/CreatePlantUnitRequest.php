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
                'file_base64' => 'required_without:file|string'
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
    /**
     * @return string
     */
    public function getPlantImage():string
    {
        return $this->input('plantImage');
    }

}
