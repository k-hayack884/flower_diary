<?php

namespace App\Packages\Presentations\Requests\CheckSeat;

use App\Http\Requests\BaseRequest;

class GetCheckSeatRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return ['checkSeatId'=>[
            'required'
        ]];
    }

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('checkSeatId');
    }
}
