<?php

namespace App\Packages\Presentations\Requests\Fertilizer;

class ResetFertilizerSettingRequest extends \App\Http\Requests\BaseRequest
{
    public function rules(): array
    {
        return [
            'fertilizerSettingId'=>[
                'required'
            ]
        ];
    }

    public function getId()
    {
       return  $this->input('fertilizerSettingId');
    }
}
