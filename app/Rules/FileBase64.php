<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileBase64 implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (preg_match('/^data:image\/(jpeg|png|gif);base64,/', $value)) {
        // $valueが画像データである場合
        return true;
    } else {
        // $valueが画像データでない場合
        return false;
    }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a base64-encoded file.';
    }
}
