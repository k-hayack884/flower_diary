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
            'checkSeatId' => [
                'required'
            ],
        ];
    }

    /**
     * @return string
     */
    public function getCheckSeatId():string
    {
        return $this->input('checkSeatId');
    }
}
