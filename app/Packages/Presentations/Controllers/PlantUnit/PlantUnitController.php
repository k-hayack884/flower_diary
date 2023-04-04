<?php

namespace App\Packages\Presentations\Controllers\PlantUnit;

use App\Http\Controllers\Controller;

use App\Packages\Presentations\Requests\PlantUnit\CreatePlantUnitRequest;
use App\Packages\Presentations\Requests\PlantUnit\DeletePlantUnitRequest;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitRequest;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitsRequest;
use App\Packages\Usecases\PlantUnit\CreatePlantUnitAction;
use App\Packages\Usecases\PlantUnit\DeletePlantUnitAction;
use App\Packages\Usecases\PlantUnit\GetPlantUnitAction;
use App\Packages\Usecases\PlantUnit\GetPlantUnitsAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlantUnitController extends Controller
{

    public function index(
        GetPlantUnitsRequest $request,
        GetPlantUnitsAction $action,
    ):array
    {
        $user = Auth::user();

        return (array)$action($request);
    }
    public function create(
        CreatePlantUnitRequest $request,
        CreatePlantUnitAction $action,
    ):array{
        $user=Auth::user();
        dd($user);
        return (array)$action($request);
    }

    public function show(
        GetPlantUnitRequest $request,
        GetPlantUnitAction $action,
        string $plantUnitId
    ):array
    {
        $request->merge(['plantUnitId' => $plantUnitId]);
        return (array)$action($request);
    }

    public function delete(
        DeletePlantUnitRequest $request,
        DeletePlantUnitAction $action,
        string $plantUnitId
    ):array
    {
        $request->merge(['plantUnitId' => $plantUnitId]);
        return (array)$action($request);
    }
}
