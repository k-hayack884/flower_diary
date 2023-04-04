<?php

namespace App\Packages\Domains\User;

interface UserRepositoryInterface
{
    public function find():array;

    public function findById(UserId $userId):User;

    public function save(User $user, ?UserPassword $password);

    public function delete(UserId $userId):void;
}
