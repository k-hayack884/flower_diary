<?php

namespace App\Packages\Domains\Plant;

use App\Packages\Domains\Shared\Uuid;

class PlantId
{
    private string $value;
    private Uuid $uuid;


    public function __construct(string|null $value = null)
    {
        $this->uuid = new Uuid($value);
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->uuid->getValue();
    }

    /**
     * @param PlantUnitId $plantUnitId
     * @return bool
     */
    public function equals(PlantUnitId $plantUnitId): bool
    {
        return $this->getId() === $plantUnitId->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
