<?php

namespace App\Packages\Presentations\Requests\Water;

use App\Http\Requests\BaseRequest;

class CreateWaterSettingRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'checkSeatId' => [
                'required',
            ],
            'waterSettingMonths' => [
                'required',
                'array'
            ],
            'waterSettingNote' => [
                'max:20'
            ],
            'waterSettingAmount' => [
                'required',
                'string'
            ],
            'waterSettingTimes' => [
                'required',
                'int',
                'min:1',
                'max:9'
            ],
            'waterSettingInterval' => [
                'required',
                'int',
                'min:1',
                'max:365'
            ],
            'waterSettingAlertTimes.*' => [
                'regex:/^([01]?[0-9]|2[0-3]):([0-5]?[0-9])$/',
            ],
        ];
    }

    /**
     * @return string
     */
    public function getCheckSeatId():string
    {
        return $this->input('checkSeatId');
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
     * @return array
     */
    public function getAlertTimes():array
    {
        return $this->input('waterSettingAlertTimes');
    }
}
