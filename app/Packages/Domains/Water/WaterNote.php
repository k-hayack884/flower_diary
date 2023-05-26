<?php
declare(strict_types=1);

namespace App\Packages\Domains\Water;

use DomainException;

class WaterNote
{
    public const RESET='';
    /**
     * @var string
     */
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
    public function update(string|null $note=null): WaterNote
    {
        if($note===null){
            $note=self::RESET;
        }
        if (mb_strlen($note) > 20) {
            throw new DomainException('備考欄に入力できる文字数は20字までです');
        }
        return new self($note);
    }
}
