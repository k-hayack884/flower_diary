<?php

namespace App\Packages\Presentations\Requests\Care;

class GetCareRequest extends \App\Http\Requests\BaseRequest
{
    /**
     * @return array
     */
    public function rules():array
    {
        return [
            'userId' => 'required',
        ];
    }
    public function getUserId():string
    {
        return $this->input('userId');
    }

}
