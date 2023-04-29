<?php

namespace App\Packages\Presentations\Requests\Care;

class PushCareRequest extends \App\Http\Requests\BaseRequest
{
    /**
     * @return array
     */
    public function rules():array
    {
        return [
            'alertTimeId' => 'required',
        ];
    }
    public function getAlertTimeId():string
    {
        return $this->input('alertTimeId');
    }

}
