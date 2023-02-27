<?php

namespace App\Packages\Presentations\Controllers\Fertilizer;

use App\Http\Controllers\Controller;
use App\Packages\Presentations\Requests\Fertilizer\CreateFertilizerSettingRequest;
use App\Packages\Presentations\Requests\Fertilizer\DeleteFertilizerSettingRequest;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingRequest;
use App\Packages\Presentations\Requests\Fertilizer\GetFertilizerSettingsRequest;
use App\Packages\Presentations\Requests\Fertilizer\ResetFertilizerSettingRequest;
use App\Packages\Presentations\Requests\Fertilizer\UpdateFertilizerSettingRequest;
use App\Packages\Usecases\Fertilizer\CreateFertilizerSettingAction;
use App\Packages\Usecases\Fertilizer\DeleteFertilizerSettingAction;
use App\Packages\Usecases\Fertilizer\GetFertilizerSettingAction;
use App\Packages\Usecases\Fertilizer\GetFertilizerSettingsAction;
use App\Packages\Usecases\Fertilizer\ResetFertilizerSettingAction;
use App\Packages\Usecases\Fertilizer\UpdateFertilizerSettingAction;
use Illuminate\Support\Facades\Gate;

class FertilizerSettingController extends Controller
{

    public function index(
        GetFertilizerSettingsRequest $request,
        GetFertilizerSettingsAction $action,
    ):array
    {
        return (array)$action($request);
    }
    public function create(
        CreateFertilizerSettingRequest $request,
        CreateFertilizerSettingAction $action,
    ):array{
        return (array)$action($request);
    }

    public function show(
        GetFertilizerSettingRequest $request,
        GetFertilizerSettingAction $action,
        string $fertilizerId
    ):array
    {
        $request->merge(['fertilizerSettingId' => $fertilizerId]);
        return (array)$action($request);
    }

    public function update(
        UpdateFertilizerSettingRequest $request,
        UpdateFertilizerSettingAction $action,
        string $fertilizerId
    ):array
    {
        $request->merge(['fertilizerSettingId' => $fertilizerId]);
        return (array)$action($request);
    }
    public function reset(
        ResetFertilizerSettingRequest $request,
        ResetFertilizerSettingAction $action,
        string $fertilizerId
    ):array
    {
        $request->merge(['fertilizerSettingId' => $fertilizerId]);
        return (array)$action($request);
    }
    public function delete(
        DeleteFertilizerSettingRequest $request,
        DeleteFertilizerSettingAction $action,
        string $fertilizerId
    ):array
    {
        $request->merge(['fertilizerSettingId' => $fertilizerId]);
        return (array)$action($request);
    }
}
