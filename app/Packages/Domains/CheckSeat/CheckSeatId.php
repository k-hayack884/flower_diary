<?php

namespace App\Packages\Domains\CheckSeat;

use App\Packages\Domains\Shared\Uuid;

class CheckSeatId
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
     * @param CheckSeatId $checkSeatId
     * @return bool
     */
    public function equals(CheckSeatId $checkSeatId): bool
    {
        return $this->getId() === $checkSeatId->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
