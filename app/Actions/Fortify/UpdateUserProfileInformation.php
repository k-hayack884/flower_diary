<?php

namespace App\Actions\Fortify;

use App\Packages\Domains\User\User;
use App\Packages\Domains\User\UserId;
use App\Packages\infrastructures\User\UserRepository;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        dd($user);

        $userRepository=new UserRepository();
//        Validator::make($input, [
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
//            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
//        ])->validateWithBag('updateProfileInformation');
        dd($user);

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }



        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            dd($user->user_id,$input['name'],$input['email'],$user->password,$user->role);
            $updateUser=new User(new UserId($user->user_id),$input['name'],$input['email'],$user->password,$user->role);
            dd($updateUser);

            $userRepository->save($updateUser);

//            $user->forceFill([
//                'name' => $input['name'],
//                'email' => $input['email'],
//            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
