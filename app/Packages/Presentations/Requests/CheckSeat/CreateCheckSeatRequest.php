<?php

namespace App\Packages\Presentations\Requests\CheckSeat;

use App\Http\Requests\BaseRequest;

class CreateCheckSeatRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'checkSeatWaterIds' => [
                'array'
            ],
            'checkSeatFertilizerIds' => [
                'array',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getWaterIds():array
    {
        return $this->input('checkSeatWaterIds');
    }

    /**
     * @return array
     */
    public function getFertilizerIds():array
    {
        return $this->input('checkSeatFertilizerIds');
    }
}
