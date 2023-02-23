<?php

namespace App\Packages\Domains\Fertilizer;

use DomainException;

class FertilizerNote
{
    public const RESET = '';
    /**
     * @var string
     */
    public string $note;

    /**
     * @param string|null $note
     */
    public function __construct(string|null $note=null)
    {
        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        if ($note === null) {
            $this->note = self::RESET;
        } else {
            $this->note = $note;
        }
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->note;
    }

    /**
     * @param string|null $note
     * @return FertilizerNote
     */
    public function update(string|null $note=null): FertilizerNote
    {
        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        if ($note === null) {
            $note = self::RESET;
        }
        return new self($note);
    }
}
