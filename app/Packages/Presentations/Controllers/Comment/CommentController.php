<?php

namespace App\Packages\Presentations\Controllers\Comment;

use App\Http\Controllers\Controller;

use App\Packages\Presentations\Requests\Comment\CreateCommentRequest;
use App\Packages\Presentations\Requests\Comment\DeleteCommentRequest;
use App\Packages\Presentations\Requests\Comment\GetCommentsRequest;
use App\Packages\Presentations\Requests\Comment\GetDiariesRequest;
use App\Packages\Presentations\Requests\Comment\GetCommentRequest;
use App\Packages\Presentations\Requests\Comment\UpdateCommentRequest;
use App\Packages\Usecases\Comment\CreateCommentAction;
use App\Packages\Usecases\Comment\DeleteCommentAction;
use App\Packages\Usecases\Comment\GetCommentsAction;
use App\Packages\Usecases\Comment\GetDiariesAction;
use App\Packages\Usecases\Comment\GetCommentAction;
use App\Packages\Usecases\Comment\UpdateCommentAction;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index(
        GetCommentsRequest $request,
        GetCommentsAction  $action
    ): array
    {
        return (array)$action($request);
    }


    public function create(
        CreateCommentRequest $request,
        CreateCommentAction  $action
    ): array
    {
        return (array)$action($request);
    }

    public function show(
        GetCommentRequest $request,
        GetCommentAction  $action,
        string $commentId
    ): array
    {
        $request->merge(['commentId' => $commentId]);


        return (array)$action($request);
    }
    public function update(
        UpdateCommentRequest $request,
        UpdateCommentAction  $action,
        string $commentId
    ): array
    {
        $request->merge(['commentId' => $commentId]);
        //ログインユーザーのIDを追加
        return (array)$action($request);
    }
    public function delete(
        DeleteCommentRequest $request,
        DeleteCommentAction  $action,
        string $commentId
    ): array
    {
        $request->merge(['commentId' => $commentId]);
        return (array)$action($request);
    }


}
