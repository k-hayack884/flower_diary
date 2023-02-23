<?php

namespace App\Packages\Domains\Fertilizer;

use App\Packages\Domains\Shared\Uuid;

class FertilizerSettingId
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
     * @param FertilizerSettingId $fertilizerSettingId
     * @return bool
     */
    public function equals(FertilizerSettingId $fertilizerSettingId): bool
    {
        return $this->getId() === $fertilizerSettingId->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
