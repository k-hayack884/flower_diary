<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class GetDiariesRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules():array
    {
        return [
            'plantUnitId' => 'nullable',
            ];
    }

    /**
     * @return string|null
     */
    public function getPlantUnitId():string|null
    {
        return $this->input('plantUnitId');
    }

}
