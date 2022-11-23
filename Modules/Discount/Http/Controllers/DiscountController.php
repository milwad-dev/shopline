<?php

namespace Modules\Discount\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Discount\Http\Requests\DiscountRequest;
use Modules\Discount\Models\Discount;
use Modules\Discount\Repositories\DiscountRepoEloquentInterface;
use Modules\Discount\Services\DiscountService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
use Modules\Share\Services\ShareService;

class DiscountController extends Controller
{
    /**
     * Get class.
     *
     * @var string
     */
    private string $class = Discount::class;

    /**
     * Get discount repo eloquent.
     *
     * @var DiscountRepoEloquentInterface
     */
    protected DiscountRepoEloquentInterface $repo;

    /**
     * Get discount service.
     *
     * @var DiscountService
     */
    protected DiscountService $service;

    public function __construct(DiscountRepoEloquentInterface $discountRepoEloquent, DiscountService $discountService)
    {
        $this->repo = $discountRepoEloquent;
        $this->service = $discountService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize('manage', $this->class);
        return view('Discount::index', ['discounts' => $this->repo->getLatest()->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize('manage', $this->class);
        return view('Discount::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DiscountRequest $request)
    {
        $this->authorize('manage', $this->class);
        $this->service->store($request->validated());

        return $this->successMessageWithRedirect('Create discount');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Discount\Discount  $discount
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Discount $discount)
    {
        $this->authorize('manage', $this->class);
        return view('Discout::edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\Discount\Discount  $discount
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DiscountRequest $request, Discount $discount)
    {
        $this->authorize('manage', $this->class);
        $this->service->update($request->validated(), $discount->id);

        return $this->successMessageWithRedirect('Update discount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Discount\Discount  $discount
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Discount $discount)
    {
        $this->authorize('manage', $this->class);
        $discount->delete();

        return AjaxResponses::SuccessResponse();
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
        return to_route('categories.index');
    }
}
