<?php

namespace App\Packages\Presentations\Controllers\PlantUnit;

use App\Http\Controllers\Controller;

use App\Packages\Presentations\Requests\PlantUnit\CreatePlantUnitRequest;
use App\Packages\Presentations\Requests\PlantUnit\DeletePlantUnitRequest;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitRequest;
use App\Packages\Presentations\Requests\PlantUnit\GetPlantUnitsRequest;
use App\Packages\Presentations\Requests\PlantUnit\UpdatePlantUnitNameRequest;
use App\Packages\Usecases\PlantUnit\CreatePlantUnitAction;
use App\Packages\Usecases\PlantUnit\DeletePlantUnitAction;
use App\Packages\Usecases\PlantUnit\GetPlantUnitAction;
use App\Packages\Usecases\PlantUnit\GetPlantUnitsAction;
use App\Packages\Usecases\PlantUnit\UpdatePlantUnitNameAction;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PlantUnitController extends Controller
{
    /**
     * @param GetPlantUnitsRequest $request
     * @param GetPlantUnitsAction $action
     * @return array
     */
    public function index(
        GetPlantUnitsRequest $request,
        GetPlantUnitsAction $action,
    ):array
    {
        $userId = $request->input('userId');
        $request->merge(['userId' => $userId]);
        return (array) $action($request);
    }

    /**
     * @param CreatePlantUnitRequest $request
     * @param CreatePlantUnitAction $action
     * @return array
     * @throws Exception
     */
    public function create(
        CreatePlantUnitRequest $request,
        CreatePlantUnitAction $action,
    ):array{
        return (array)$action($request);
    }

    /**
     * @param GetPlantUnitRequest $request
     * @param GetPlantUnitAction $action
     * @param string $plantUnitId
     * @return array
     */
    public function show(
        GetPlantUnitRequest $request,
        GetPlantUnitAction $action,
        string $plantUnitId
    ):array
    {
        $request->merge(['plantUnitId' => $plantUnitId]);
        return (array)$action($request);
    }

    /**
     * @param UpdatePlantUnitNameRequest $request
     * @param UpdatePlantUnitNameAction $action
     * @param string $plantUnitId
     * @return array
     * @throws Exception
     */
    public function updateName(
        UpdatePlantUnitNameRequest $request,
        UpdatePlantUnitNameAction $action,
        string $plantUnitId
    ):array
    {
        $request->merge(['plantUnitId' => $plantUnitId]);
        return (array)$action($request);
    }

    /**
     * @param DeletePlantUnitRequest $request
     * @param DeletePlantUnitAction $action
     * @param string $plantUnitId
     * @return array
     * @throws Exception
     */
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
