<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class DeleteCommentRequest extends BaseRequest
{
    /**
     * @return array[]
     */
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

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('commentId');
    }

    /**
     * @return string
     */
    public function getUserId():string
    {
        return $this->input('commentUserId');
    }
}
