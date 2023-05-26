<?php

namespace App\Packages\Presentations\Requests\Fertilizer;

class GetFertilizerSettingsRequest extends \App\Http\Requests\BaseRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'checkSeatId' => 'nullable',
        ];

    }

    /**
     * @return string|null
     */
    public function getCheckSeatId():string|null
    {
        return $this->input('checkSeatId');
    }
}
