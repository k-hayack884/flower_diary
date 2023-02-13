<?php

namespace App\Packages\Presentations\Requests\CheckSeat;

use App\Http\Requests\BaseRequest;

class GetCheckSeatRequest extends BaseRequest
{
    public function rules(): array
    {
        return [];
    }
//        return ['checkSeat.id'=>[
//            'required'
//        ]];
//    }
//    public function getId():array
//    {
//        return $this->checkseat['checkSeat.id'];
//    }
}
