<?php

namespace Modules\Home\Http\Controllers\Comment;

use Modules\Home\Http\Requests\Comment\CommentRequest;
use Modules\Home\Services\Comment\CommentService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class CommentController extends Controller
{
    /**
     * Store comment by request.
     *
     * @param CommentRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request)
    {
        resolve(CommentService::class)->store($request->all());

        ShareService::successToast('Comment successfully created.');

        return redirect()->back();
    }
}
