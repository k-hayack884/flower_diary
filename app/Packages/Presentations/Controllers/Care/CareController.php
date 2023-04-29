<?php

namespace App\Packages\Presentations\Controllers\Care;

use App\Packages\Presentations\Requests\Care\GetCareRequest;
use App\Packages\Presentations\Requests\Care\PushCareRequest;
use App\Packages\Usecases\Care\GetCareAction;
use App\Packages\Usecases\Care\PushCareAction;

class CareController extends \App\Http\Controllers\Controller
{
    public function index(
        GetCareRequest $request,
        GetCareAction  $action,
    ): array
    {
        $userId = $request->input('userId');
        $request->merge(['userId' => $userId]);
        return (array) $action($request);
    }
    public function push(
        PushCareRequest $request,
        PushCareAction  $action,
    )
    {
        $alertTimeId = $request->input('alertTimeId');
        $request->merge(['userId' => $alertTimeId]);
        return (array) $action($request);
    }
}
