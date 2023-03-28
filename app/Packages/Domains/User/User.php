<?php

namespace App\Packages\Domains\User;

use Illuminate\Support\Facades\Hash;

class User
{
    private UserId $userId;
    private string $name;
    private string $email;
    private string $password;
    private int $role;

    public function __construct(UserId $userId, string $name, string $email,string $password, int $role)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->email = $email;
        $this->password=$password;
        $this->role = $role;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

}
