<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
use Modules\Share\Services\ShareService;
use Modules\Share\Traits\SuccessToastMessageWithRedirectTrait;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\Slider\Http\Requests\SliderRequest;
use Modules\Slider\Models\Slider;
use Modules\Slider\Repositories\SliderRepoEloquentInterface;
use Modules\Slider\Services\SliderServiceInterface;

class SliderController extends Controller
{
    use SuccessToastMessageWithRedirectTrait;

    private string $redirectRoute = 'sliders.index';

    /**
     * Get model.
     */
    private string $class = Slider::class;

    /**
     * Get service.
     */
    public SliderServiceInterface $service;

    /**
     * Get respository.
     */
    public SliderRepoEloquentInterface $repo;

    public function __construct(SliderServiceInterface $sliderService, SliderRepoEloquentInterface $sliderRepo)
    {
        $this->service = $sliderService;
        $this->repo = $sliderRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('manage', $this->class);
        $sliders = $this->repo->getLatest()->paginate();

        return view('Slider::index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('manage', $this->class);

        return view('Slider::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws AuthorizationException
     */
    public function store(SliderRequest $request)
    {
        $this->authorize('manage', $this->class);

        ShareService::uploadMediaWithAddInRequest($request);
        $this->service->store($request->all());

        return $this->successMessageWithRedirect('Create slider');
    }

    /**
     * Edit slider with route model binding.
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws AuthorizationException
     */
    public function edit(Slider $slider)
    {
        $this->authorize('manage', $this->class);

        return view('Slider::edit', compact('slider'));
    }

    /**
     * Update slider with route model binding & request.
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws AuthorizationException
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $this->authorize('manage', $this->class);

        $this->uploadMediaForUpdateSlider($request, $slider);
        $this->service->update($request->all(), $slider);

        return $this->successMessageWithRedirect('Update slider');
    }

    /**
     * Delete slider route model binding.
     *
     *
     * @return JsonResponse
     *
     * @throws AuthorizationException
     */
    public function destroy(Slider $slider)
    {
        $this->authorize('manage', $this->class);
        $slider->delete();

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Update status to active.
     *
     *
     * @return JsonResponse
     *
     * @throws AuthorizationException
     */
    public function active(Slider $slider)
    {
        $this->authorize('manage', $this->class);
        $this->service->updateStatus($slider, SliderStatusEnum::STATUS_ACTIVE->value);

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Update status to inactive.
     *
     *
     * @return JsonResponse
     *
     * @throws AuthorizationException
     */
    public function inactive(Slider $slider)
    {
        $this->authorize('manage', $this->class);
        $this->service->updateStatus($slider, SliderStatusEnum::STATUS_INACTIVE->value);

        return AjaxResponses::SuccessResponse();
    }

    /**
     * Upload image by request.
     */
    private function uploadMediaForUpdateSlider(SliderRequest $request, Slider $slider): void
    {
        if ($request->image) {
            $slider->media()->delete();
            ShareService::uploadMediaWithAddInRequest($request);
        } else {
            $request->request->add(['media_id' => $slider->media_id]);
        }
    }
}
