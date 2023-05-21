<?php

namespace App\Packages\Presentations\Requests\Plant;

use App\Rules\FileBase64;
use GuzzleHttp\Promise\Each;

class AddPlantRequest extends \App\Http\Requests\BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'plantId' => [
                'required'
            ],
            'plantImages.*' => [
                'required',
                new FileBase64(),
            ],
            'plantImages' => [
                'array',
                'max:5',
            ],
            'plantImage1' => [
                new FileBase64(),
            ],
            'plantImage2' => [
                new FileBase64(),
            ],
            'plantImage3' => [
                new FileBase64(),
            ],
            'plantImage4' => [
                new FileBase64(),
            ],
            'plantImage5' => [
                new FileBase64(),
            ],
        ];
    }

    /**
     * @return string
     */
    public function getPlantId():string
    {
        return $this->input('plantId');

    }

    /**
     * @return array
     */

    public function getPlantImages():array
    {
        return $this->input('plantImages');
    }

}
