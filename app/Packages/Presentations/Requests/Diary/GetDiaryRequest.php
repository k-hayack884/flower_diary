<?php

namespace App\Packages\Presentations\Requests\Diary;

use App\Http\Requests\BaseRequest;

class GetDiaryRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
//            'diary.id' => [
//                'required',
//            ],
        ];

    }

//    public function getId(): string
//    {
//        $hoge = [];
//        return $this->diary['diary.id'];
//    }
}
