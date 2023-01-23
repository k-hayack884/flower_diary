<?php

namespace App\Packages\Domains\CheckSeat;

use App\Packages\Domains\Shared\Uuid;

class WaterCheckSeatID
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

    public function equals(WaterCheckSeatID $waterSettingID): bool
    {
        return $this->getId() === $waterSettingID->getId();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
