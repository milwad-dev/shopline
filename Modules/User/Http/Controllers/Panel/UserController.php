<?php

namespace Modules\User\Http\Controllers\Panel;

use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
use Modules\Share\Services\ShareService;
use Modules\User\Http\Requests\UserRequest;
use Modules\User\Repositories\UserRepo;
use Modules\User\Services\UserService;

class UserController extends Controller
{
    public UserRepo $repo;
    public UserService $service;

    public function __construct(UserRepo $userRepo, UserService $userService)
    {
        $this->repo = $userRepo;
        $this->service = $userService;
    }

    /**
     * Get latest users.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = $this->repo->getLatestWithoutId(auth()->id())->paginate(25);

        return view('User::Panel.index', compact('users'));
    }

    /**
     * Show create view for user.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('User::Panel.create');
    }

    /**
     * Store user.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = $this->service->store($request);

        if ($request->has('email_verified_at')) {
            $user->forceFill(['email_verified_at' => now()]);
        }

        return $this->successMessageWithRedirect('User created successfully');
    }

    /**
     * Show edit view & check user is exists by id.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = $this->repo->findById($id);
        return view('User::Panel.edit', compact('user'));
    }

    /**
     * Update user.
     *
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $this->service->update($request, $id);

        return $this->successMessageWithRedirect('User updated successfully');
    }

    /**
     * Delete user by id.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $this->repo->delete($id);
        return AjaxResponses::SuccessResponse();
    }

    /**
     * Show success message with redirect.
     *
     * @param string $title
     * @return \Illuminate\Http\RedirectResponse
     */
    private function successMessageWithRedirect(string $title)
    {
        ShareService::successToast($title);
        return to_route('users.index');
    }
}
