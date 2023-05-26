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
            'userImage' => [
                'file_base64' => 'required_without:file|string'
            ]
        ];
    }

//    /**
//     * @return mixed
//     */
//    public function getDiaryContent(): mixed
//    {
//        return $this->diary['diary.content'];
//    }

}
