<?php

namespace App\Packages\Presentations\Controllers\Care;

use App\Packages\Presentations\Requests\Care\GetCareRequest;
use App\Packages\Usecases\Care\GetCareAction;

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
}
