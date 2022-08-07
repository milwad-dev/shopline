<?php

namespace Modules\Product\Services;

use Modules\Media\Services\MediaFileService;
use Modules\Product\Models\Product;
use Modules\Share\Services\ShareService;

class ProductService
{
    /**
     * Store product with request.
     *
     * @param  $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function store($request)
    {
        return $this->query()->create([
            'vendor_id' => auth()->id(),
            'first_media_id' => $request->first_media_id,
            'second_media_id' => $request->second_media_id,
            'title' => $request->title,
            'slug' => ShareService::makeSlug($request->title),
            'sku' => ShareService::makeUniqueSku(Product::class),
            'price' => $request->price,
            'count' => $request->count,
            'type' => $request->type,
            'short_description' => $request->short_description,
            'body' => $request->body,
            'status' => $request->status,
        ]);
    }

    /**
     * Update product with request by id.
     *
     * @param  $request
     * @param  $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->query()->whereId($id)->update([

        ]);
    }

    /**
     * Attach categories to product.
     *
     * @param  $categories
     * @param  $product
     * @return void
     */
    public function attachCategoreisToProduct($categories, $product)
    {
        foreach ($categories as $category) {
            $product->categories()->attach(
                collect($category)->pluck('id')
            );
        }
    }

    /**
     * Attach categories to product.
     *
     * @param  $galleries
     * @param  $product
     * @return void
     */
    public function attachGalleriesToProduct($galleries, $product)
    {
        foreach ($galleries as $gallery) {
            $product->galleries()->attach(MediaFileService::publicUpload($gallery)->id);
        }
    }

    /**
     * Attach attributes to product.
     *
     * @param  $attributes
     * @param  $product
     * @return void
     */
    public function attachAttributesToProduct($attributes, $product)
    {
        foreach ($attributes as $key => $value) {
            $product->attachAttribute($key, $value);
        }
    }

    /**
     * Attach tags to product.
     *
     * @param  array $tags
     * @param  $product
     * @return mixed
     */
    public function attachTagsToProduct(array $tags, $product)
    {
        return $product->attachTags($tags);
    }

    /**
     * Get product query (builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Product::query();
    }
}
