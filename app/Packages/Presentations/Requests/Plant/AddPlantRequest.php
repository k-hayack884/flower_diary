<?php

namespace App\Packages\Presentations\Requests\Plant;

use App\Rules\FileBase64;

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

    public function getPlantId():string
    {
        return $this->input('plantId');

    }
    /**
     * @return string
     */
    public function getImage1():string
    {
        return $this->input('plantImage1');
    }
    /**
     * @return string
     */
    public function getImage2():string
    {
        return $this->input('plantImage2');
    }
    /**
     * @return string
     */
    public function getImage3():string
    {
        return $this->input('plantImage3');
    }
    /**
     * @return string
     */
    public function getImage4():string
    {
        return $this->input('plantImage4');
    }
    /**
     * @return string
     */
    public function getImage5():string
    {
        return $this->input('plantImage5');
    }
}
