<?php

namespace App\Packages\Presentations\Requests\CheckSeat;

use App\Http\Requests\BaseRequest;

class CreateCheckSeatRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'checkSeat.waterIds' => [
                'array'
            ],
            'checkSeat.fertilizerIds' => [
                'array',
            ],
        ];
    }

    public function getWaterIds()
    {
        return $this->checkSeat['checkSeat.waterIds'];
    }
    public function getFertilizerIds()
    {
        return $this->checkSeat['checkSeat.fertilizerIds'];
    }
}
