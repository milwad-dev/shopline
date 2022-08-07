<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Modules\Media\Models\Media;
use Modules\Media\Services\MediaFileService;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Modules\Product\Services\ProductService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class ProductController extends Controller
{
    public ProductService $service;

    public function __construct(ProductService $productService)
    {
        $this->service = $productService;
    }

    /**
     * Show index page of products.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('Product::index');
    }

    /**
     * Show create product page.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('Product::create');
    }

    /**
     * Store product.
     *
     * @param  ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        ShareService::uploadMediaWithAddInRequest($request, 'first_media', 'first_media_id');
        ShareService::uploadMediaWithAddInRequest($request, 'second_media', 'second_media_id');
        $product = $this->service->store($request);

        $this->service->attachCategoreisToProducts($request->categories, $product);

        foreach ($request->galleries as $gallery) {
            $media = MediaFileService::publicUpload($gallery);
            $product->galleries()->attach($media->id);
        }

        if ($request->attributes) {
            foreach ($request->attributes as $key => $value) {
                $product->attachAttribute($key, $value);
            }
        }
        if ($request->tags) {
            $product->attachTags($request->tags);
        }

        return to_route('products.index');
    }
}
