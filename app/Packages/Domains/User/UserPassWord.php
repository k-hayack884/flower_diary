<?php

namespace App\Packages\Domains\User;

use Illuminate\Support\Facades\Hash;

class UserPassWord
{
    private string $password;
public function __construct(string $password)
{
    $this->password=Hash::make($password);
    ;
}

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
