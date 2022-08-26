<?php

namespace Modules\Advertising\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Advertising\Http\Requests\AdvertisingRequest;
use Modules\Advertising\Models\Advertising;
use Modules\Advertising\Repositories\AdvertisingRepoEloquentInterface;
use Modules\Advertising\Services\AdvertisingServiceInterface;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class AdvertisingController extends Controller
{
    private string $class = Advertising::class;

    public AdvertisingRepoEloquentInterface $repo;
    public AdvertisingServiceInterface $service;

    public function __construct(AdvertisingRepoEloquentInterface $advertisingRepoEloquent, AdvertisingServiceInterface $advertisingService)
    {
        $this->repo = $advertisingRepoEloquent;
        $this->service = $advertisingService;
    }

    /**
     * Get latest adveritings & show index page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('manage', $this->class);
        $advertisings = $this->repo->getLatest()->paginate();

        return view('Advertising::index', compact('advertisings'));
    }

    /**
     * Show advertising create page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('manage', $this->class);
        return view('Advertising::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdvertisingRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthorizationException
     */
    public function store(AdvertisingRequest $request)
    {
        $this->authorize('manage', $this->class);

        ShareService::uploadMediaWithAddInRequest($request);
        $this->service->store($request->all());

        return $this->successMessageWithRedirect('Create advertising');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Advertising\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertising $advertising)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \Modules\Advertising\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertising $advertising)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Advertising\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertising $advertising)
    {
        //
    }

    /**
     * Show success message with redirect;
     *
     * @param  string $title
     * @return \Illuminate\Http\RedirectResponse
     */
    private function successMessageWithRedirect(string $title)
    {
        ShareService::successToast($title);
        return to_route('advertisings.index');
    }
}
