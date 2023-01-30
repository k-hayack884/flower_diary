<?php

namespace App\Packages\Domains\CheckSeat;

use App\Packages\Domains\Shared\Uuid;

class CheckSeatId
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
     * @param CheckSeatId $waterSettingID
     * @return bool
     */
    public function equals(CheckSeatId $waterSettingID): bool
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
