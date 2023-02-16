<?php

namespace App\Packages\Presentations\Requests\Comment;

class CreateCommentRequest extends \App\Http\Requests\BaseRequest
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
