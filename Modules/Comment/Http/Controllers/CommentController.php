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
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize('manage', $this->class);

        return view('Comment::index', [
            'comments' => $this->repo->getLatest()->paginate(),
        ]);
    }

    /**
     * Remove comment by route model binding.
     *
     * @param Comment $comment
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('manage', $this->class);
        $comment->delete();

        return AjaxResponses::SuccessResponse();
    }
}
