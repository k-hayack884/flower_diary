<?php

namespace App\Packages\Presentations\Requests\PlantUnit;

class GetPlantUnitsRequest extends \App\Http\Requests\BaseRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'userId' => 'nullable',
        ];
    }
    public function getUserId():string|null
    {
        return $this->input('userId');
    }
}
