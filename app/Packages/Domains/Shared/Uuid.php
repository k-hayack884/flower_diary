<?php

namespace App\Packages\Domains\Shared;

use DomainException;
use Illuminate\Support\Str;

class Uuid
{
    private const UUID_LENGTH=36;
    /**
     * @var string
     */
    private string $value;

    /**
     * @param string|null $value
     */
    public function __construct(string|null $value=null)
    {
        if($value===null){
            $this->value=(string)Str::orderedUuid();
        }else{
            $this->value=$value;
        }
        if(strlen($this->value)!==self::UUID_LENGTH){
            throw new DomainException('uuid is invalid. value:'.$this->value);
        }
    }

    /**
     * @return string|null
     */
    public function getValue():?string
    {
        return $this->value;
    }

    /**
     * @param Uuid $uuid
     * @return bool
     */
    public function equals(Uuid $uuid):bool
    {
        return $this->value===$uuid->getvalue();
    }

    /**
     * @return String
     */
    public function __toString():String
    {
        return $this->value;
    }
}
