<?php

namespace App\Packages\Domains\PlantUnit;

use DomainException;

class PlantUnitImage
{
    private string $plantFile;
    public function __construct(string $plantFile)
    {
        if($plantFile===null){
            throw new DomainException('植物の画像を取得できませんでした');
        }
        $this->plantFile = $plantFile;
    }

    /**
     * @param string $plantFile
     * @return PlantUnitImage
     */
    public function update(string $plantFile): PlantUnitImage
    {
        if($plantFile===null){
            throw new DomainException('植物の画像を取得できませんでした');
        }
        return new self($plantFile);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->plantFile;
    }
}
