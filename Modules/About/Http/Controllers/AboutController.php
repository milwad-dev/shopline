<?php

namespace Modules\About\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Modules\About\Http\Requests\AboutRequest;
use Modules\About\Models\About;
use Modules\About\Services\AboutService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class AboutController extends Controller
{
    private string $class = About::class;

    protected AboutService $service;

    public function __construct(AboutService $aboutService)
    {
        $this->service = $aboutService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('manage', $this->class);
        return view('About::index', ['abouts' => []]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('manage', $this->class);
        return view('About::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthorizationException
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
     * Show the form for editing the specified resource.
     *
     * @param  About $about
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(About $about)
    {
        $this->authorize('manage', $this->class);
        return view('About::edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Modules\About\About $about
     * @return \Illuminate\Http\Response
     * @throws AuthorizationException
     */
    public function update(AboutRequest $request, About $about)
    {
        $this->authorize('manage', $this->class);

    }

    # Private methods
    /**
     * Show success message with redirect;
     *
     * @param  string $title
     * @return \Illuminate\Http\RedirectResponse
     */
    private function successMessageWithRedirect(string $title)
    {
        ShareService::successToast($title);
        return to_route('products.index');
    }
}
