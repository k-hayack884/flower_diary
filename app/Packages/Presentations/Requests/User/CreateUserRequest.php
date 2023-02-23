<?php

namespace App\Packages\Presentations\Requests\User;

use App\Actions\Fortify\PasswordValidationRules;

class CreateUserRequest extends \App\Http\Requests\BaseRequest
{
    use PasswordValidationRules;

    public function rules(): array
    {
        return [
            'user.name' => [
                'required', 'string', 'max:20'
            ],
            'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            //terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ];
    }

    public function getDiaryContent()
    {
        return $this->diary['diary.content'];
    }

}
