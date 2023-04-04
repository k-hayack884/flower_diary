<?php

namespace App\Packages\Presentations\Requests;

class UploadImageRequest extends \App\Http\Requests\BaseRequest
{
    public function rules()
    {
        return [
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
    public function message()
    {
        return [
            'image' => '指定されたファイルが画像ではありません',
            'mines' => '指定された拡張子(jpg/jpeg/png)ではありません',
            'max' => 'ファイルサイズは2MB以内にしてください',
        ];
    }
}
