<?php

namespace App\Packages\Presentations\Controllers\Plant;


use App\Http\Controllers\Controller;
use App\Packages\Presentations\Requests\Plant\AddPlantRequest;
use App\Packages\Presentations\Requests\Plant\GetPlantRequest;
use App\Packages\Presentations\Requests\Plant\GetPlantsRequest;
use App\Packages\Usecases\Plant\AddPlantAction;
use App\Packages\Usecases\Plant\GetPlantAction;
use App\Packages\Usecases\Plant\GetPlantsAction;
use App\Packages\Usecases\Plant\ScanPlantAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{

    /**
     * @param GetPlantsRequest $request
     * @param GetPlantsAction $action
     * @return array
     */
    public function index(
        GetPlantsRequest $request,
        GetPlantsAction  $action,
    ): array
    {
        return (array)$action($request);
    }

    /**
     * @param GetPlantRequest $request
     * @param GetPlantAction $action
     * @param string $plantId
     * @return array
     */
    public function show(
        GetPlantRequest $request,
        GetPlantAction  $action,
        string          $plantId
    ): array
    {
        $request->merge(['plantId' => $plantId]);
        return (array)$action($request);
    }

    /**
     * @param Request $request
     * @param ScanPlantAction $action
     * @return array
     */
    public function scan(
        Request         $request,
        ScanPlantAction $action): array
    {

        $request = $request->input('plantLabel');
        return (array)$action($request);
    }

    /**
     * @param AddPlantRequest $request
     * @param AddPlantAction $action
     * @return array
     */
    public function add(
        AddPlantRequest $request,
        AddPlantAction  $action,
    ): array
    {
        return (array)$action($request);
    }

}
