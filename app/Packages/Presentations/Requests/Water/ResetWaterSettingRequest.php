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
            'waterSettingId'=>[
                'require'
            ]
        ];
    }

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('waterSettingId');
    }
}
