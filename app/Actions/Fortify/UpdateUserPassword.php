<?php

namespace App\Actions\Fortify;

use App\Packages\Domains\User\UserId;
use App\Packages\Domains\User\UserPassWord;
use App\Packages\infrastructures\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'current_password' => ['required', 'string', 'current_password:web'],
            'password' => $this->passwordRules(),
        ], [
            'current_password.current_password' => __('The provided password does not match your current password.'),
        ])->validateWithBag('updatePassword');

        $userRepository = new UserRepository();
        $password=new UserPassWord($input['password']);

        $userObject = new \App\Packages\Domains\User\User(new UserId($user->user_id),$user->name,$user->email,$user->role);
        //ToDO パスワード変更をすると認証が解除される　今のところは仕様ということで、変更のセッションメッセージを残せばいいんじゃないか
        $userRepository->save($userObject,$password);

//        $user->forceFill([
//            'password' => Hash::make($input['password']),
//        ])->save();
    }
}
