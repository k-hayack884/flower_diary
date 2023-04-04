<?php

namespace App\Packages\Presentations\Controllers\Plant;


use App\Http\Controllers\Controller;
use App\Packages\Usecases\Plant\ScanPlantAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScanPlantController extends Controller
{
    public function scan(
        Request         $request,
        ScanPlantAction $action):array
    {

        $request = $request->input('plantLabel');
        return (array)$action($request);
    }
}
