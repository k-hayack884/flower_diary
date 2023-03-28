<?php

namespace App\Packages\infrastructures\User;

use App\Packages\Domains\User\User;
use App\Packages\Domains\User\UserId;

class UserRepository implements \App\Packages\Domains\User\UserRepositoryInterface
{

    public function find(): array
    {
        return \App\Models\User::all();
    }

    public function findById(UserId $userId): User
    {
        return \App\Models\user::where('user_id', $userId->getId())->first();
    }

    public function save(User $user)
    {
        dd($user);

        return \App\Models\User::updateOrCreate(['user_id' =>(string)$user->getUserId()->getId()],
            ['user_id' =>  (string)$user->getUserId()->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'role' => $user->getrole(),
            ]);
    }

    public function delete(UserId $userId): void
    {
        // TODO: Implement delete() method.
    }
}
