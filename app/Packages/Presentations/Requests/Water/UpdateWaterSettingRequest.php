<?php

namespace App\Packages\Presentations\Requests\Water;

use App\Http\Requests\BaseRequest;

class UpdateWaterSettingRequest extends BaseRequest
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
    public function getMonths():array
    {
        return $this->waterSetting['waterSetting.months'];
    }
    public function getNote():string|null
    {
        return $this->waterSetting['waterSetting.note'];
    }
    public function getAmount():string
    {
        return $this->waterSetting['waterSetting.amount'];
    }
    public function getWateringTimes():int
    {
        return $this->waterSetting['waterSetting.times'];
    }
    public function getWateringInterval():int
    {
        return $this->waterSetting['waterSetting.interval'];
    }
    public function getAlertTimes(){
        return $this->waterSetting['waterSetting.alertTime'];

    }

}
