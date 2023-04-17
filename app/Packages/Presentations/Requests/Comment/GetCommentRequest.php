<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class GetCommentRequest extends BaseRequest
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'diaryId' => 'nullable',
        ];
    }

    /**
     * @return string
     */
    public function getId():string
    {
        return $this->input('commentId');
    }


}
