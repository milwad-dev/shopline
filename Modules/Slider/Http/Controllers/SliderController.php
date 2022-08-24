<?php

namespace Modules\Slider\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;
use Modules\Slider\Http\Requests\SliderRequest;
use Modules\Slider\Models\Slider;
use Modules\Slider\Services\SliderService;

class SliderController extends Controller
{
    /**
     * Get model.
     *
     * @var string
     */
    private string $class = Slider::class;

    /**
     * Get service.
     *
     * @var SliderService
     */
    public SliderService $service;

    public function __construct(SliderService $sliderService)
    {
        $this->service = $sliderService;
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
        $sliders = null;

        return view('Slider::index', compact('sliders'));
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
        return view('Slider::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SliderRequest $request
     * @return \Illuminate\Http\RedirectResponse
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
     * @param  Slider $slider
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws AuthorizationException
     */
    public function edit(Slider $slider)
    {
        $this->authorize('manage', $this->class);
        return view('Slider::edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\Slider\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Slider\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
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
        return to_route('sliders.index');
    }
}
