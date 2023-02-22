<?php

namespace App\Packages\Presentations\Requests\Water;

use App\Http\Requests\BaseRequest;

class CreateWaterSettingRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'waterSettingMonths' => [
                'required',
                'array'
            ],
            'waterSettingNote' => [
                'string',
                'max:20'
            ],
            'waterSettingAmount' => [
                'required',
                'string'
            ],
            'waterSettingTimes' => [
                'required',
                'int',
                'digits_between:1,9'
            ],
            'waterSettingInterval' => [
                'required',
                'int',
                'digits_between:1,365'
            ],
        ];
    }

    /**
     * @return array
     */
    public function getMonths():array
    {
        return $this->input('waterSettingMonths');
    }

    /**
     * @return string|null
     */
    public function getNote():string|null
    {
        return $this->input('waterSettingNote');
    }

    /**
     * @return string
     */
    public function getAmount():string
    {
        return $this->input('waterSettingAmount');
    }

    /**
     * @return int
     */
    public function getWateringTimes():int
    {
        return $this->input('waterSettingTimes');
    }

    /**
     * @return int
     */
    public function getWateringInterval():int
    {
        return $this->input('waterSettingInterval');
    }
}
