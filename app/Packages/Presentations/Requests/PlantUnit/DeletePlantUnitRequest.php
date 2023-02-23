<?php

namespace App\Packages\Presentations\Requests\PlantUnit;

class DeletePlantUnitRequest extends \App\Http\Requests\BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return ['plantUnitId'=>[
            'required'
        ]];
    }

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('plantUnitId');
    }
}
