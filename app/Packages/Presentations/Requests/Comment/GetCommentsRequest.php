<?php

namespace App\Packages\Presentations\Requests\Comment;

use App\Http\Requests\BaseRequest;

class GetCommentsRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules():array
    {
        return [];
    }
}
