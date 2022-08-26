<?php

namespace Modules\Advertising\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Advertising\Models\Advertising;
use Modules\Advertising\Repositories\AdvertisingRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;

class AdvertisingController extends Controller
{
    public AdvertisingRepoEloquentInterface $repo;

    public function __construct(AdvertisingRepoEloquentInterface $advertisingRepoEloquent)
    {
        $this->repo = $advertisingRepoEloquent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $advertisings = $this->repo->getLatest()->paginate();

        return view('Advertising::index', compact('advertisings'));
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
     * @param  \Modules\Advertising\Models\Advertising  $advertising
     * @return \Illuminate\Http\Response
     */
    public function show(Advertising $advertising)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
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
}
