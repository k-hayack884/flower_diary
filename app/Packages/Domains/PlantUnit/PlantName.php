<?php

namespace App\Packages\Domains\PlantUnit;

use DomainException;

class PlantName
{
    public const RESET = '';
    /**
     * @var string
     */
    private string $name;

    /**
     * @param string|null $name
     */
    public function __construct(string|null $name=null)
    {
        if($name===null){
            $this->name='';
        }
        if (mb_strlen($name) > 10) {
            throw new DomainException('ニックネームは２０字以下に設定してください');
        }
        $this->name = $name;
    }

    /**
     * @param string|null $name
     * @return PlantName
     */
    public function update(string|null $name=null): PlantName
    {
        if (mb_strlen($name) > 10) {
            throw new DomainException('名前は１０字以下に設定してください');
        }
        if ($name === null) {
            $name = self::RESET;
        }
        return new self($name);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->name;
    }
}
