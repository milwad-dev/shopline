<?php

namespace Modules\About\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Modules\About\Http\Requests\AboutRequest;
use Modules\About\Models\About;
use Modules\About\Services\AboutService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Traits\SuccessToastMessageWithRedirectTrait;

class AboutController extends Controller
{
    use SuccessToastMessageWithRedirectTrait;

    private string $class = About::class;
    private string $redirectRoute = 'abouts.index';
    protected AboutService $service;

    public function __construct(AboutService $aboutService)
    {
        $this->service = $aboutService;
    }

    /**
     * Get all abouts with show index about page.
     *
     * @throws AuthorizationException
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->authorize('manage', $this->class);

        return view('About::index', ['abouts' => About::query()->latest()->get()]);
    }

    /**
     * Show create about page.
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('manage', $this->class);

        return view('About::create');
    }

    /**
     * Store about.
     *
     * @param AboutRequest $request
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function store(AboutRequest $request)
    {
        $this->authorize('manage', $this->class);
        if (About::query()->count() >= 1) {
            abort(403);
        }
        $this->service->store($request->all());

        return $this->successMessageWithRedirect('Create about');
    }

    /**
     * Show edit about page.
     *
     * @param About $about
     *
     * @throws AuthorizationException
     *
     * @return Application|Factory|View
     */
    public function edit(About $about)
    {
        $this->authorize('manage', $this->class);

        return view('About::edit', compact('about'));
    }

    /**
     * Update about by route model binding.
     *
     * @param AboutRequest $request
     * @param About        $about
     *
     * @throws AuthorizationException
     *
     * @return RedirectResponse
     */
    public function update(AboutRequest $request, About $about)
    {
        $this->authorize('manage', $this->class);
        $this->service->update($about, $request->body);

        return $this->successMessageWithRedirect('Update about');
    }
}
