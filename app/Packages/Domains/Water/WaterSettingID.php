<?php

namespace App\Packages\Domains\Water;

use App\Packages\Domains\Shared\Uuid;

class WaterSettingID
{
    private Uuid $uuid;

    public function __construct(string|null $value = null)
    {
        $this->uuid = new Uuid($value);
    }

    public function getId(): ?string
    {
        return $this->uuid->getValue();
    }

    public function equals(WaterSettingID $waterSettingID): bool
    {
        return $this->getId() === $waterSettingID->getId();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
