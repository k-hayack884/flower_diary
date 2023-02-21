<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class DeleteCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'commentId' => [
                'required',
            ],
            'commentUserId' => [
                'required',
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
}
