<?php

namespace App\Packages\Presentations\Requests\Water;

use App\Http\Requests\BaseRequest;

class GetWaterSettingsRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'checkSeatId' => 'nullable',
        ];
    }

    /**
     * @return string|null
     */
    public function getCheckSeatId(): string|null
    {
        return $this->input('checkSeatId');
    }
}
