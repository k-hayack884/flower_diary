<?php

namespace App\Packages\Presentations\Requests\Fertilizer;

use App\Http\Requests\BaseRequest;

class UpdateFertilizerSettingRequest extends BaseRequest
{
    public function rules(): array
    {
        return [

            'fertilizerSettingId' => [
                'required',
            ],
            'fertilizerSettingMonths' => [
                'required',
                'array'
            ],
            'fertilizerSettingNote' => [
                'string',
                'max:20'
            ],
            'fertilizerSettingAmount' => [
                'required',
                'int'
            ],
            'fertilizerSettingName' => [
                'required',
                'string',
                'max:20'
            ],
        ];
    }
    public function getId()
    {
        return $this->input('fertilizerSettingId');
    }
    public function getMonths():array
    {
        return $this->input('fertilizerSettingMonths');
    }
    public function getNote():string|null
    {
        return $this->input('fertilizerSettingNote');
    }
    public function getAmount():int
    {
        return $this->input('fertilizerSettingAmount');
    }
    public function getName():string
    {
        return $this->input('fertilizerSettingName');
    }
}
