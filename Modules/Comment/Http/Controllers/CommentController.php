<?php

namespace Modules\Comment\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Modules\Comment\Models\Comment;
use Modules\Comment\Repositories\CommentRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;

class CommentController extends Controller
{
    private string $class = Comment::class;

    public CommentRepoEloquentInterface $repo;

    public function __construct(CommentRepoEloquentInterface $commentRepoEloquent)
    {
        $this->repo = $commentRepoEloquent;
    }

    /**
     * Get the latest comments & show view page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('manage', $this->class);

        return view('Comment::index', [
            'comments' => $this->repo->getLatest()->paginate()
        ]);
    }

    /**
     * Remove comment by route model binding.
     *
     * @param  Comment $comment
     * @return \Illuminate\Http\JsonResponse
     * @throws AuthorizationException
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('manage', $this->class);
        $comment->delete();

        return AjaxResponses::SuccessResponse();
    }
}
