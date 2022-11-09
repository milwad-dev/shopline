<?php

namespace Modules\Home\Http\Controllers\Search;

use Illuminate\Http\Request;
use Modules\Home\Repositories\Search\SearchRepoEloquent;
use Modules\Share\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Search & show view page.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        $search = $request->search;
        $products = resolve(SearchRepoEloquent::class)->searchProducts($search);

        return view('Home::pages.search.home', compact(['search', 'products']));
    }
}
