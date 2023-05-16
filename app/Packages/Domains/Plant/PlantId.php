<?php

namespace App\Packages\Domains\Plant;

use App\Packages\Domains\Shared\Uuid;

class PlantId
{
    /**
     * @var string
     * @var Uuid
     */
    private string $value;

    /**
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->value;
    }

    /**
     * @param PlantUnitId $plantUnitId
     * @return bool
     */
    public function equals(PlantId $plantId): bool
    {
        return $this->getId() === $plantId->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
