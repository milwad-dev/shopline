<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Modules\Category\Repositories\CategoryRepo;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Repositories\ProductRepo;
use Modules\Product\Services\ProductService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Responses\AjaxResponses;
use Modules\Share\Services\ShareService;

class ProductController extends Controller
{
    public ProductService $service;
    public ProductRepo $repo;

    public function __construct(ProductService $productService, ProductRepo $productRepo)
    {
        $this->service = $productService;
        $this->repo = $productRepo;
    }

    /**
     * Show index page of products.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = $this->repo->index()
            ->with(['categories', 'first_media', 'second_media', 'tags'])
            ->paginate(10);

        return view('Product::index', compact('products'));
    }

    /**
     * Show create product page.
     *
     * @return Application|Factory|View
     */
    public function create(CategoryRepo $categoryRepo)
    {
        $categories = $categoryRepo->getActiveCategories()->get();

        return view('Product::create', compact('categories'));
    }

    /**
     * Store product.
     *
     * @param ProductRequest $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(ProductRequest $request)
    {
        dd($request->all());
        ShareService::uploadMediaWithAddInRequest($request, 'first_media', 'first_media_id');
        ShareService::uploadMediaWithAddInRequest($request, 'second_media', 'second_media_id');

        $product = $this->service->store($request);

        $this->service->attachCategoriesToProduct($request->categories, $product);
        $this->service->attachGalleriesToProduct($request->galleries, $product);

        if ($request->attributes) {
            $this->service->attachAttributesToProduct($request->attributes, $product);
        }
        if ($request->tags) {
            $this->service->attachTagsToProduct($request->tags, $product);
        }

        return to_route('products.index');
    }

    /**
     * Find product by id with show edit product page.
     *
     * @param  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $product = $this->repo->findById($id);

        return view('Product::edit', compact(['product']));
    }

    /**
     * Update product with request by id.
     * @param  ProductRequest $request
     *
     * @param  $id
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, $id)
    {
        if ($request->first_media) {
            ShareService::uploadMediaWithAddInRequest($request, 'first_media', 'first_media_id');
        }
        if ($request->second_media) {
            ShareService::uploadMediaWithAddInRequest($request, 'second_media', 'second_media_id');
        }

        $productId = $this->service->update($request, $id);
        $product = $this->repo->findById($productId);

//        $this->service->attachCategoriesToProduct($request->categories, $product);
//        $this->service->attachGalleriesToProduct($request->galleries, $product);
// TODO Better
        if ($request->attributes) {
            $this->service->attachAttributesToProduct($request->attributes, $product);
        }
        if ($request->tags) {
            $this->service->attachTagsToProduct($request->tags, $product);
        }

        return to_route('products.index');
    }

    /**
     * Delete product by id.
     *
     * @param  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        // TODO DELETE CATEGORIES & ...

        return AjaxResponses::SuccessResponse();
    }
}
