<?php
declare(strict_types=1);

namespace App\Packages\Domains\Water;

use DomainException;

readonly class WaterNote
{
    public const RESET='';
    public string $note;

    public function __construct(string|null $note)
    {

        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        if($note===null){
            $this->note=self::RESET;
        }else{
            $this->note = $note;
        }

    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }
    public function update(string|null $note): WaterNote
    {
        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        if($note===null){
            $note=self::RESET;
        }
        return new self($note);
    }

}
