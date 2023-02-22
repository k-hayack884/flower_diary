<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class CreateCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'commentUserId' => [
                'required',
            ],
            'commentContent' => [
                'required',
                'string',
                'max:200'
            ]
        ];
    }

    public function getUserId()
    {
        return $this->input('commentUserId');

    }

    public function getCommentContent()
    {
        return $this->input('commentContent');
    }
}
