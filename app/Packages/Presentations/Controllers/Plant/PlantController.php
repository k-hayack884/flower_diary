<?php

namespace App\Packages\Presentations\Controllers\Plant;


use App\Http\Controllers\Controller;
use App\Packages\Presentations\Requests\Plant\AddPlantRequest;
use App\Packages\Presentations\Requests\Plant\GetPlantRequest;
use App\Packages\Usecases\Plant\AddPlantAction;
use App\Packages\Usecases\Plant\GetPlantAction;
use App\Packages\Usecases\Plant\ScanPlantAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function show(
        GetPlantRequest $request,
        GetPlantAction  $action,
        string          $plantId
    ): array
    {
        $request->merge(['plantId' => $plantId]);
        return (array)$action($request);
    }

    public function scan(
        Request         $request,
        ScanPlantAction $action): array
    {

        $request = $request->input('plantLabel');
        return (array)$action($request);
    }

    public function add(
        AddPlantRequest $request,
        AddPlantAction  $action,
    )
    {
        return (array)$action($request);
    }

}
