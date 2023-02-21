<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class GetCommentRequest extends BaseRequest
{
    public function rules(): array
    {
        return ['commentId'=>[
            'required'
        ]];
    }
    public function getId():string
    {
        return $this->input('commentId');
    }

}
