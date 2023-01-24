<?php

namespace App\Packages\Presentations\Requests\Fertilizer;

use App\Http\Requests\BaseRequest;

class CreateFertilizerSettingRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fertilizerSetting.months' => [
                'required',
                'array'
            ],
            'fertilizerSetting.note' => [
                'string',
                'max:20'
            ],
            'fertilizerSetting.amount' => [
                'required',
                'int'
            ],
            'fertilizerSetting.name' => [
                'required',
                'string',
                'max:20'
            ],
        ];
    }

    public function getMonths():array
    {
        return $this->fertilizerSetting['fertilizerSetting.months'];
    }
    public function getNote():string|null
    {
        return $this->fertilizerSetting['fertilizerSetting.note'];
    }
    public function getAmount():int
    {
        return $this->fertilizerSetting['fertilizerSetting.amount'];
    }
    public function getName():string
    {
        return $this->fertilizerSetting['fertilizerSetting.name'];
    }
}
