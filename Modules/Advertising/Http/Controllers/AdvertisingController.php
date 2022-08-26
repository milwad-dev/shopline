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
     * Store adveritisng by request.
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
     * Show edit advertising page by id.
     *
     * @param  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('manage', $this->class);
        $advertising = $this->repo->findById($id);

        return view('Advertising::edit', compact('advertising'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Advertising $advertising
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advertising $advertising
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
