<?php

namespace App\Packages\Domains\Water;

use App\Packages\Domains\Shared\Uuid;

class WaterCheckSeatID
{
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
     * @param WaterCheckSeatID $waterSettingID
     * @return bool
     */
    public function equals(WaterCheckSeatID $waterSettingID): bool
    {
        return $this->getId() === $waterSettingID->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
