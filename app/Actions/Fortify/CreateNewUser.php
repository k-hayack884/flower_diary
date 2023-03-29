<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Packages\Domains\User\UserId;
use App\Packages\Domains\User\UserPassWord;
use App\Packages\infrastructures\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
//            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        $userRepository = new UserRepository();
        $userId = new UserId();
        $password=new UserPassWord($input['password']);

        $user = new \App\Packages\Domains\User\User($userId, $input['name'], $input['email'], 9);
        return $userRepository->save($user,$password);
    }
}
