<?php

namespace App\Packages\Presentations\Requests\Care;

class GetCareFertilizerRequest extends \App\Http\Requests\BaseRequest
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

    /**
     * @return string
     */
    public function getUserId():string
    {
        return $this->input('userId');
    }

}
