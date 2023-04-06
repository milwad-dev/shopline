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
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('manage', $this->class);

        return view('Advertising::create');
    }

    /**
     * Store adveritisng by request.
     *
     * @param AdvertisingRequest $request
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
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
     * @param $id
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
     * @param AdvertisingRequest $request
     * @param                    $id
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Http\RedirectResponse
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
     * @param $id
     *
     * @throws AuthorizationException
     *
     * @return \Illuminate\Http\JsonResponse
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
     * @param        $id
     * @param string $status
     *
     * @throws AuthorizationException
     *
     * @return JsonResponse
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

    /**
     * @param AdvertisingRequest $request
     * @param Advertising        $advertising
     *
     * @return void
     */
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
