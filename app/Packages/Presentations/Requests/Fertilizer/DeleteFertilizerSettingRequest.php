<?php

namespace App\Packages\Presentations\Requests\Fertilizer;

use App\Http\Requests\BaseRequest;

class DeleteFertilizerSettingRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
        ];
    }

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('fertilizerSettingId');
    }
}
