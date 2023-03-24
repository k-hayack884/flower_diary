<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class UpdateCommentRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'diaryId' => [
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

    public function getDiaryId(): string
    {
        return $this->input('diaryId');

    }

    /**
     * @return string
     */
    public function getUserId():string
    {
        return $this->input('commentUserId');
    }

    /**
     * @return string
     */
    public function getCommentContent():string
    {
        return $this->input('commentContent');
    }
}
