<?php
declare(strict_types=1);

namespace App\Packages\Domains\Water;

use DomainException;

readonly class WaterNote
{
    public const RESET='';
    public string $note;

    /**
     * @param string|null $note
     */
    public function __construct(string|null $note)
    {
        if($note===null){
            $this->note=self::RESET;
        }else{
            if (mb_strlen($note) > 20) {
                throw new DomainException('備考欄に入力できる文字数は20字までです');
            }
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
     * @return WaterNote
     */
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
