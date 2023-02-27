<?php

namespace App\Packages\Presentations\Controllers\Water;

use App\Http\Controllers\Controller;
use App\Packages\Presentations\Requests\Water\CreateWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\DeleteWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\GetWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\GetWaterSettingsRequest;
use App\Packages\Presentations\Requests\Water\ResetWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\UpdateWaterSettingRequest;
use App\Packages\Usecases\Water\CreateWaterSettingAction;
use App\Packages\Usecases\Water\DeleteWaterSettingAction;
use App\Packages\Usecases\Water\GetWaterSettingAction;
use App\Packages\Usecases\Water\GetWaterSettingsAction;
use App\Packages\Usecases\Water\ResetWaterSettingAction;
use App\Packages\Usecases\Water\UpdateWaterSettingAction;
use Illuminate\Support\Facades\Gate;

class WaterSettingController extends Controller
{

    public function index(
        GetWaterSettingsRequest $request,
        GetWaterSettingsAction $action,
    ):array
    {
        return (array)$action($request);
    }
    public function create(
        CreateWaterSettingRequest $request,
        CreateWaterSettingAction $action,
    ):array{
        return (array)$action($request);
    }

    public function show(
        GetWaterSettingRequest $request,
        GetWaterSettingAction $action,
        string $waterId
    ):array
    {
        $request->merge(['waterSettingId' => $waterId]);
        return (array)$action($request);
    }

    public function update(
        UpdateWaterSettingRequest $request,
        UpdateWaterSettingAction $action,
        string $waterId
    ):array
    {
        $request->merge(['waterSettingId' => $waterId]);
        return (array)$action($request);
    }
    public function reset(
        ResetWaterSettingRequest $request,
        ResetWaterSettingAction $action,
        string $waterId
    ):array
    {
        $request->merge(['waterSettingId' => $waterId]);
        return (array)$action($request);
    }
    public function delete(
        DeleteWaterSettingRequest $request,
        DeleteWaterSettingAction $action,
        string $waterId
    ):array
    {
        $request->merge(['waterSettingId' => $waterId]);
        return (array)$action($request);
    }

}
