<?php

namespace App\Packages\Presentations\Requests\Fertilizer;

use App\Http\Requests\BaseRequest;

class DeleteFertilizerSettingRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'fertilizerSettingId' => [
                'required',
            ],
        ];
    }

    public function getId()
    {
        return $this->input('fertilizerSettingId');
    }
}
