<?php

namespace Modules\Advertising\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Modules\Advertising\Enums\AdvertisingStatusEnum;
use Modules\Advertising\Http\Requests\AdvertisingRequest;
use Modules\Advertising\Models\Advertising;
use Modules\Advertising\Repositories\AdvertisingRepoEloquentInterface;
use Modules\Advertising\Services\AdvertisingServiceInterface;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
use Modules\Share\Services\ShareService;
use Modules\Share\Traits\SuccessToastMessageWithRedirectTrait;

class AdvertisingController extends Controller
{
    use SuccessToastMessageWithRedirectTrait;

    private string $class = Advertising::class;

    private string $redirectRoute = 'advertisings.index';

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
     *
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
     *
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
     *
     * @return \Illuminate\Http\RedirectResponse
     *
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
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
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
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws AuthorizationException
     */
    public function update(AdvertisingRequest $request, $id)
    {
        $this->authorize('manage', $this->class);

        $advertising = $this->repo->findById($id);

        $this->uploadMediaForUpdateAdvertising($request, $advertising);
        $this->service->update($request->all(), $id);

        return $this->successMessageWithRedirect('Update advertising');
    }

    /**
     * Delete advertising by id.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize('manage', $this->class);
        $this->repo->delete($id);

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Update advertising status by id.
     *
     *
     * @return JsonResponse
     *
     * @throws AuthorizationException
     */
    public function updateStatus($id, string $status)
    {
        $this->authorize('manage', $this->class);

        $active = AdvertisingStatusEnum::STATUS_ACTIVE->value;
        $inactive = AdvertisingStatusEnum::STATUS_INACTIVE->value;

        switch ($status) {
            case $active:
                $this->service->updateStatus($id, $active);
                break;
            case $inactive:
                $this->service->updateStatus($id, $inactive);
                break;
            default:
                abort(404);
        }

        return AjaxResponses::SuccessResponse();
    }

    private function uploadMediaForUpdateAdvertising(AdvertisingRequest $request, Advertising $advertising): void
    {
        if ($request->image) {
            $advertising->media()->delete();
            ShareService::uploadMediaWithAddInRequest($request);
        } else {
            $request->request->add(['media_id' => $advertising->media_id]);
        }
    }
}
