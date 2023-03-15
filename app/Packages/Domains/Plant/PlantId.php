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
     * @param string|null $value
     */
    public function __construct(string|null $value = null)
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
