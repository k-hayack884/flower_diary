<?php

namespace App\Packages\Presentations\Controllers\Plant;


use Illuminate\Http\Request;

class ScanPlantController
{
    public function scan(Request $request){
        $hoge=$request->input('plantLabel');
        return response()->json([
            'message' => $hoge
        ]); //200が入ってる
    }
}
