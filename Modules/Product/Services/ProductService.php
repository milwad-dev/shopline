<?php

namespace Modules\Product\Services;

use Modules\Media\Services\MediaFileService;
use Modules\Product\Models\Product;
use Modules\Share\Services\ShareService;

class ProductService implements ProductServiceInterface
{
    /**
     * Store product with request.
     *
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     * @throws \Exception
     */
    public function store(array $data)
    {
        return $this->query()->create([
            'vendor_id'         => auth()->id(),
            'slug'              => ShareService::makeSlug($data['title']),
            'sku'               => ShareService::makeUniqueSku(Product::class),
            'first_media_id'    => $data['first_media_id'],
            'title'             => $data['title'],
            'price'             => $data['price'],
            'count'             => $data['count'],
            'type'              => $data['type'],
            'short_description' => $data['short_description'],
            'body'              => $data['body'],
            'status'            => $data['status'],
            'is_popular'        => $data['is_popular'],
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
            'first_media_id'    => $request->first_media_id,
            'title'             => $request->title,
            'slug'              => ShareService::makeSlug($request->title),
            'price'             => $request->price,
            'count'             => $request->count,
            'type'              => $request->type,
            'short_description' => $request->short_description,
            'body'              => $request->body,
            'status'            => $request->status,
            'is_popular'        => $request->is_popular,
        ]);
    }

    /**
     * Attach categories to product.
     *
     * @param  $categories
     * @param  $product
     * @return void
     */
    public function attachCategoriesToProduct($categories, $product)
    {
        foreach ($categories as $category) {
            $product->categories()->attach($category);
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
        foreach ($attributes as $attribute) {
            $product->attachAttribute($attribute['attributekeys'], $attribute['attributevalues']);
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
     * First or create categories product.
     *
     * @param  array $categories
     * @param  $product
     * @return void
     */
    public function firstOrCreateCategoriesToProduct(array $categories, $product)
    {
        foreach ($categories as $category) {
            $product->categories()->syncWithoutDetaching($category);
        }
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
