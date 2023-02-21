<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class UpdateCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'commentId' => [
                'required',
            ],
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
    public function getId()
    {
        return $this->input('commentId');
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
