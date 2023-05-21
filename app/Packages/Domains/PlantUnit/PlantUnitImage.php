<?php

namespace App\Packages\Domains\PlantUnit;

use DomainException;

class PlantUnitImage
{
    private string $plantFile;
    public function __construct(string $plantFile)
    {
        $this->plantFile = $plantFile;
    }

    /**
     * @param string $plantFile
     * @return PlantUnitImage
     */
    public function update(string $plantFile): PlantUnitImage
    {
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
