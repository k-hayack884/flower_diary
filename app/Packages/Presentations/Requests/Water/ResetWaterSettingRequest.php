<?php

namespace App\Packages\Presentations\Requests\Water;

use App\Http\Requests\BaseRequest;

class ResetWaterSettingRequest extends BaseRequest
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
        ];
    }

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('waterSettingId');
    }
    /**
     * @return string
     */
    public function getCheckSeatId():string
    {
        return $this->input('checkSeatId');
    }
}
