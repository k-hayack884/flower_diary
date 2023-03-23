<?php

namespace App\Packages\Presentations\Requests\CheckSeat;

use App\Http\Requests\BaseRequest;

class ResetCheckSeatRequest extends BaseRequest
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
    public function getCheckSeatId():string
    {
        return $this->input('checkSeatId');
    }
}
