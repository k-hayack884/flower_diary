<?php

namespace App\Packages\Domains\User;

use App\Models\User;
use App\Packages\Domains\Diary\DiaryId;
use App\Packages\Domains\Shared\Uuid;

class UserId
{
    /**
     * @var string
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
     * @param UserId $userId
     * @return bool
     */
    public function equals(UserId $userId): bool
    {
        return $this->getId() === $userId->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
