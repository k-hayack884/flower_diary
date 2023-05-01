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
            'checkSeatId' => [
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
            'waterSettingAlertTimes.*' => [
                'regex:/^([01]?[0-9]|2[0-3]):([0-5]?[0-9])$/',
            ],
        ];
}
    public function getId()
    {
        return $this->input('waterSettingId');
    }

    public function getCheckSeatId():string
    {
        return $this->input('checkSeatId');
    }
    /**
     * @return array
     */
    public function getMonths():array
    {

        $months= $this->input('waterSettingMonths');
        return array_map('intval', $months);
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
