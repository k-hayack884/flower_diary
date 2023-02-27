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
use Illuminate\Support\Facades\Gate;

class DiaryController extends Controller
{
    public function index(
        GetDiariesRequest $request,
        GetDiariesAction  $action
    ): array
    {
        return (array)$action($request);
    }


    public function create(
        CreateDiaryRequest $request,
        CreateDiaryAction  $action
    ): array
    {
        return (array)$action($request);
    }

    public function show(
        GetDiaryRequest $request,
        GetDiaryAction  $action,
        string          $diaryId
    ): array
    {
        $request->merge(['diaryId' => $diaryId]);
        return (array)$action($request);
    }

    public function update(
        UpdateDiaryRequest $request,
        UpdateDiaryAction  $action,
        string             $diaryId
    ): array
    {
        $request->merge(['diaryId' => $diaryId]);
        return (array)$action($request);
    }

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
