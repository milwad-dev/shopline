<?php

namespace Modules\Product\Services;

use Modules\Media\Services\MediaFileService;
use Modules\Product\Models\Product;
use Modules\Share\Services\ShareService;

class ProductService
{
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

    public function update($request, $id)
    {
        return $this->query()->whereId($id)->update([

        ]);
    }

    public function attachCategoreisToProduct($categories, $product)
    {
        foreach ($categories as $category) {
            $product->categories()->attach(
                collect($category)->pluck('id')
            );
        }
    }

    public function attachGalleriesToProduct($galleries, $product)
    {
        foreach ($galleries as $gallery) {
            $product->galleries()->attach(MediaFileService::publicUpload($gallery)->id);
        }
    }

    public function attachAttributesToProduct($attributes, $product)
    {
        foreach ($attributes as $key => $value) {
            $product->attachAttribute($key, $value);
        }
    }

    public function attachTagsToProduct($tags, $product)
    {
        return $product->attachTags($tags);
    }

    private function query()
    {
        return Product::query();
    }
}
