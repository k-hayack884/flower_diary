<?php

namespace App\Packages\Domains\PlantUnit;

use App\Packages\Domains\Shared\Uuid;

class PlantUnitId
{
    /**
     * @var string
     * @var Uuid
     */
    private string $value;
    private Uuid $uuid;

    /**
     * @param string|null $value
     */
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

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
