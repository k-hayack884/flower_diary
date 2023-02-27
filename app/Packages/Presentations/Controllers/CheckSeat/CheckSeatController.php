<?php

namespace App\Packages\Presentations\Controllers\CheckSeat;

use App\Http\Controllers\Controller;

use App\Packages\Presentations\Requests\CheckSeat\CreateCheckSeatRequest;
use App\Packages\Presentations\Requests\CheckSeat\GetCheckSeatRequest;
use App\Packages\Usecases\CheckSeat\CreateCheckSeatAction;
use App\Packages\Usecases\CheckSeat\GetCheckSeatAction;
use Illuminate\Support\Facades\Gate;

class CheckSeatController extends Controller
{

    public function create(
        CreateCheckSeatRequest $request,
        CreateCheckSeatAction  $action
    ): array
    {
        return (array)$action($request);
    }

    public function show(
        GetCheckSeatRequest $request,
        GetCheckSeatAction  $action,
        string $checkSeatId
    ): array
    {
        $request->merge(['checkSeatId' => $checkSeatId]);
        return (array)$action($request);
    }
}
