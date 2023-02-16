<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class DeleteCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'comment.userId' => [
                'required',
            ]
        ];
    }

    public function getUserId()
    {
        return $this->comment['comment.userId'];

    }
}
