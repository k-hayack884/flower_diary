<?php
declare(strict_types=1);

namespace App\Packages\Domains\Water;

use DomainException;

readonly class WaterAmountNote
{
    public string $note;

    public function __construct(string $note)
    {
//        if($note===null){
//            throw new \DomainException('備考欄に文字を入力してください');
//        }
        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }
    public function update(string $note): WaterAmountNote
    {
        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        return new self($note);
    }
    public function reset(): WaterAmountNote
    {
        return new self('');
    }
}
