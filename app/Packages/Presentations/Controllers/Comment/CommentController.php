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
use Exception;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    /**
     * @param GetCommentsRequest $request
     * @param GetCommentsAction $action
     * @return array
     */
    public function index(
        GetCommentsRequest $request,
        GetCommentsAction  $action
    ): array
    {
        $diaryId = $request->input('diaryId');
        $request->merge(['diaryId' => $diaryId]);
        return (array)$action($request);
    }

    /**
     * @param CreateCommentRequest $request
     * @param CreateCommentAction $action
     * @return array
     */
    public function create(
        CreateCommentRequest $request,
        CreateCommentAction  $action
    ): array
    {
        return (array)$action($request);
    }

    /**
     * @param GetCommentRequest $request
     * @param GetCommentAction $action
     * @param string $commentId
     * @return array
     */
    public function show(
        GetCommentRequest $request,
        GetCommentAction  $action,
        string $commentId
    ): array
    {
        $request->merge(['commentId' => $commentId]);


        return (array)$action($request);
    }

    /**
     * @param UpdateCommentRequest $request
     * @param UpdateCommentAction $action
     * @param string $commentId
     * @return array
     * @throws Exception
     */
    public function update(
        UpdateCommentRequest $request,
        UpdateCommentAction  $action,
        string $commentId
    ): array
    {
        $request->merge(['commentId' => $commentId]);
        return (array)$action($request);
    }

    /**
     * @param DeleteCommentRequest $request
     * @param DeleteCommentAction $action
     * @param string $commentId
     * @return array
     * @throws Exception
     */
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
