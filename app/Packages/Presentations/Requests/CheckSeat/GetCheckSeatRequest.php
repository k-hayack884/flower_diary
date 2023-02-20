<?php

namespace App\Packages\Presentations\Requests\CheckSeat;

use App\Http\Requests\BaseRequest;

class GetCheckSeatRequest extends BaseRequest
{
    public function rules(): array
    {
        return ['checkSeatId'=>[
            'required'
        ]];
    }
    public function getId():string
    {
        return $this->input('checkSeatId');
    }
}
