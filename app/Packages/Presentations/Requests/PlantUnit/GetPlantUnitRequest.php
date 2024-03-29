<?php

namespace App\Packages\Presentations\Requests\PlantUnit;

class GetPlantUnitRequest extends \App\Http\Requests\BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('plantUnitId');
    }
}
