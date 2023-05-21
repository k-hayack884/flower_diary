<?php

namespace App\Packages\Presentations\Controllers\CheckSeat;

use App\Exceptions\CheckSeatException;
use App\Http\Controllers\Controller;

use App\Packages\Presentations\Requests\CheckSeat\CreateCheckSeatRequest;
use App\Packages\Presentations\Requests\CheckSeat\GetCheckSeatRequest;
use App\Packages\Presentations\Requests\CheckSeat\ResetCheckSeatRequest;
use App\Packages\Usecases\CheckSeat\CreateCheckSeatAction;
use App\Packages\Usecases\CheckSeat\GetCheckSeatAction;
use App\Packages\Usecases\CheckSeat\ResetCheckSeatAction;

class CheckSeatController extends Controller
{
    /**
     * @param CreateCheckSeatRequest $request
     * @param CreateCheckSeatAction $action
     * @return array
     * @throws CheckSeatException
     */
    public function create(
        CreateCheckSeatRequest $request,
        CreateCheckSeatAction  $action
    ): array
    {
        return (array)$action($request);
    }

    /**
     * @param GetCheckSeatRequest $request
     * @param GetCheckSeatAction $action
     * @param string $checkSeatId
     * @return array
     */
    public function show(
        GetCheckSeatRequest $request,
        GetCheckSeatAction  $action,
        string $checkSeatId
    ): array
    {
        $request->merge(['checkSeatId' => $checkSeatId]);
        return (array)$action($request);
    }

    /**
     * @param ResetCheckSeatRequest $request
     * @param ResetCheckSeatAction $action
     * @param string $checkSeatId
     * @return array
     */
    public function reset(
        ResetCheckSeatRequest $request,
        ResetCheckSeatAction  $action,
        string $checkSeatId
    ): array
    {
        $request->merge(['checkSeatId' => $checkSeatId]);
        return (array)$action($request);
    }
}
