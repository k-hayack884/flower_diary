<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Base64Service
{
    static public function base64FileDecode($data,$folderName)
    {
        $filename = Str::random(40);
        // base64データをデコードする
        $filedata = base64_decode($data);

// storage/appにファイルを保存する
        Storage::put($folderName.'/'.$filename, $filedata);

// 保存されたファイルのパスを取得する
        $file_path = Storage::path($folderName.'/'.$filename);

        return $filename;
}
static public function base64FileEncode($data,$folderName){

    $file_path = Storage::path($folderName.'/'.$data);

// ファイルを読み込む
    $file_data = file_get_contents($file_path);

// Base64エンコードする
    $base64_data = base64_encode($file_data);
    return $base64_data;

}
}
