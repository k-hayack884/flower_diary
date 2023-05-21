<?php

namespace App\Packages\Presentations\Requests\Care;

class PushCareFertilizerRequest extends \App\Http\Requests\BaseRequest
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

    /**
     * @return string
     */
    public function getAlertTimeId():string
    {
        return $this->input('alertTimeId');
    }

}
