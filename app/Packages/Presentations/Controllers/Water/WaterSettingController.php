<?php

namespace App\Packages\Presentations\Controllers\Water;

use App\Http\Controllers\Controller;
use App\Packages\Presentations\Requests\Water\GetWaterSettingRequest;
use App\Packages\Presentations\Requests\Water\GetWaterSettingsRequest;
use App\Packages\Usecases\Water\GetWaterSettingAction;
use App\Packages\Usecases\Water\GetWaterSettingsAction;
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
    public function show(
        GetWaterSettingRequest $request,
        GetWaterSettingAction $action,
    ):array
    {
        return (array)$action($request);
    }
}
