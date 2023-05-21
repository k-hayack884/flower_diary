<?php

namespace App\Packages\infrastructures\User;

use App\Packages\Domains\User\User;
use App\Packages\Domains\User\UserId;
use App\Packages\Domains\User\UserPassWord;

class UserRepository implements \App\Packages\Domains\User\UserRepositoryInterface
{
    /**
     * @return array
     */
    public function find(): array
    {
        return \App\Models\User::all();
    }

    /**
     * @param UserId $userId
     * @return User
     */
    public function findById(UserId $userId): User
    {
        return \App\Models\user::where('user_id', $userId->getId())->first();
    }

    /**
     * @param User $user
     * @param UserPassWord|null $password
     * @return mixed
     */
    public function save(User $user, ?UserPassword $password=null)
    {
        if (is_null($password)) {
            $hitUser=\App\Models\user::where('user_id', $user->getUserId()->getId())->first();
            $userPassword=$hitUser->password;
        }else{
            $userPassword=$password->getPassword();
        }

        return \App\Models\User::updateOrCreate(['user_id' =>(string)$user->getUserId()->getId()],
            ['user_id' =>  (string)$user->getUserId()->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => $userPassword,
                'role' => $user->getrole(),
            ]);
    }

    /**
     * @param UserId $userId
     * @return void
     */
    public function delete(UserId $userId): void
    {
        // TODO: Implement delete() method.
    }
}
