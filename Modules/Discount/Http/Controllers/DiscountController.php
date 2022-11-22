<?php

namespace Modules\Discount\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Discount\Models\Discount;
use Modules\Discount\Repositories\DiscountRepoEloquentInterface;
use Modules\Discount\Services\DiscountService;
use Modules\Share\Http\Controllers\Controller;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\Discount\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\Discount\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\Discount\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\Discount\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }
}
