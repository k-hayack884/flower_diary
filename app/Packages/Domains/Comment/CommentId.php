<?php

namespace App\Packages\Domains\Comment;

use App\Packages\Domains\Shared\Uuid;

class CommentId
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
     * @param CommentId $commentId
     * @return bool
     */
    public function equals(CommentId $commentId): bool
    {
        return $this->getId() === $commentId->getId();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}
