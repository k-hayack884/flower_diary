<?php

namespace App\Packages\Presentations\Requests\Water;

use App\Http\Requests\BaseRequest;

class UpdateWaterSettingRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'waterSettingId' => [
                'required',
            ],
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
            'waterSettingAlertTimes' => [
                'array'
            ],
        ];
}
    public function getId()
    {
        return $this->input('waterSettingId');
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

    /**
     * @return mixed
     */
    public function getAlertTimes(): mixed
    {
        return $this->input('waterSettingAlertTimes');
    }
}
