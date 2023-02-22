<?php

namespace App\Packages\Presentations\Requests\Water;

use App\Http\Requests\BaseRequest;

class DeleteWaterSettingRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'waterSettingId'=>[
                'require'
            ]
        ];
    }

    public function getId()
    {
        return $this->input('waterSettingId');
    }

}
