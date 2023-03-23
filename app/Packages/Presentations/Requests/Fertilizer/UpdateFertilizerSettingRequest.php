<?php

namespace App\Packages\Presentations\Requests\Fertilizer;

use App\Http\Requests\BaseRequest;

class UpdateFertilizerSettingRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'checkSeatId' => [
                'required'
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

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('fertilizerSettingId');
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
        return $this->input('fertilizerSettingMonths');
    }

    /**
     * @return string|null
     */
    public function getNote():string|null
    {
        return $this->input('fertilizerSettingNote');
    }

    /**
     * @return int
     */
    public function getAmount():int
    {
        return $this->input('fertilizerSettingAmount');
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->input('fertilizerSettingName');
    }
}
