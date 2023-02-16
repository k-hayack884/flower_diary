<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class UpdateCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'comment.userId' => [
                'required',
            ],
            'comment.content' => [
                'required',
                'string',
                'max:200'
            ]
        ];
    }

    public function getUserId()
    {
        return $this->comment['comment.userId'];

    }

    public function getCommentContent()
    {
        return $this->comment['comment.content'];
    }
}
