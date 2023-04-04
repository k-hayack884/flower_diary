<?php

namespace App\Http\Requests;

class UploadImageRequest extends BaseRequest
{
    public function authorize()
    {
        return true; //falseになっているのでtrueに切り替える
    }
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
