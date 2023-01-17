<?php
declare(strict_types=1);

namespace App\Packages\Domains\Water;

use DomainException;

readonly class WaterNote
{
    public const RESET='';
    public string $note;

    public function __construct(string|null $note=null)
    {

        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        if($note===null){
            $this->note='';
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
    public function update(string|null $note=null): WaterAmountNote
    {
        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        if($note===null){
            $this->note='';
        }
        return new self($note);
    }
}
