<?php

namespace App\Packages\Presentations\Controllers\Diary;

use App\Http\Controllers\Controller;

use App\Packages\Presentations\Requests\Diary\CreateDiaryRequest;
use App\Packages\Presentations\Requests\Diary\DeleteDiaryRequest;
use App\Packages\Presentations\Requests\Diary\GetDiariesRequest;
use App\Packages\Presentations\Requests\Diary\GetDiaryRequest;
use App\Packages\Presentations\Requests\Diary\UpdateDiaryRequest;
use App\Packages\Usecases\Diary\CreateDiaryAction;
use App\Packages\Usecases\Diary\DeleteDiaryAction;
use App\Packages\Usecases\Diary\GetDiariesAction;
use App\Packages\Usecases\Diary\GetDiaryAction;
use App\Packages\Usecases\Diary\UpdateDiaryAction;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class DiaryController extends Controller
{
    /**
     * @param GetDiariesRequest $request
     * @param GetDiariesAction $action
     * @return array
     */
    public function index(
        GetDiariesRequest $request,
        GetDiariesAction  $action,
    ): array
    {
        $plantUnitId = $request->input('plantUnitId');
        $request->merge(['plantUnitId' => $plantUnitId]);
        return (array) $action($request);
    }

    /**
     * @param CreateDiaryRequest $request
     * @param CreateDiaryAction $action
     * @return array
     * @throws Exception
     */
    public function create(
        CreateDiaryRequest $request,
        CreateDiaryAction  $action
    ): array
    {
        return (array)$action($request);
    }

    /**
     * @param GetDiaryRequest $request
     * @param GetDiaryAction $action
     * @param string $diaryId
     * @return array
     */
    public function show(
        GetDiaryRequest $request,
        GetDiaryAction  $action,
        string          $diaryId
    ): array
    {
        $request->merge(['diaryId' => $diaryId]);
        return (array)$action($request);
    }

    /**
     * @param UpdateDiaryRequest $request
     * @param UpdateDiaryAction $action
     * @param string $diaryId
     * @return array
     */
    public function update(
        UpdateDiaryRequest $request,
        UpdateDiaryAction  $action,
        string             $diaryId
    ): array
    {
        $request->merge(['diaryId' => $diaryId]);
        return (array)$action($request);
    }

    /**
     * @param DeleteDiaryRequest $request
     * @param DeleteDiaryAction $action
     * @param string $diaryId
     * @return array
     * @throws Exception
     */
    public function delete(
        DeleteDiaryRequest $request,
        DeleteDiaryAction  $action,
        string             $diaryId
    ): array
    {
        $request->merge(['diaryId' => $diaryId]);
        return (array)$action($request);
    }
}
