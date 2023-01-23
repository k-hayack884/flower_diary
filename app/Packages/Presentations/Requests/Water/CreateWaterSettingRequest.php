<?php

namespace App\Packages\Presentations\Requests\Water;

use App\Http\Requests\BaseRequest;

class CreateWaterSettingRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'waterSetting.months' => [
                'required',
                'array'
            ],
            'waterSetting.note' => [
                'string',
                'max:20'
            ],
            'waterSetting.amount' => [
                'required',
                'string'
            ],
            'waterSetting.times' => [
                'required',
                'int',
                'digits_between:1,9'
            ],
            'waterSetting.interval' => [
                'required',
                'int',
                'digits_between:1,365'
            ],
            'waterSetting.alertTimes' => [
                'array'
            ],
        ];
    }

    /**
     * @return array
     */
    public function getMonths():array
    {
        return $this->waterSetting['waterSetting.months'];
    }

    /**
     * @return string|null
     */
    public function getNote():string|null
    {
        return $this->waterSetting['waterSetting.note'];
    }

    /**
     * @return string
     */
    public function getAmount():string
    {
        return $this->waterSetting['waterSetting.amount'];
    }

    /**
     * @return int
     */
    public function getWateringTimes():int
    {
        return $this->waterSetting['waterSetting.times'];
    }

    /**
     * @return int
     */
    public function getWateringInterval():int
    {
        return $this->waterSetting['waterSetting.interval'];
    }
}
