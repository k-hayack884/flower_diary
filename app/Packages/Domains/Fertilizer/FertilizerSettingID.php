<?php

namespace App\Packages\Domains\Fertilizer;

use App\Packages\Domains\Shared\Uuid;

class FertilizerSettingID
{
    private Uuid $uuid;
    private string $value;

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
     * @param FertilizerSettingID $fertilizerSettingID
     * @return bool
     */
    public function equals(FertilizerSettingID $fertilizerSettingID): bool
    {
        return $this->getId() === $fertilizerSettingID->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
