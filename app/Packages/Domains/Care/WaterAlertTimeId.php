<?php

namespace App\Packages\Domains\Care;

use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Shared\Uuid;

class WaterAlertTimeId
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
     * @param WaterAlertTimeId $diaryId
     * @return bool
     */
    public function equals(WaterAlertTimeId $diaryId): bool
    {
        return $this->getId() === $diaryId->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
