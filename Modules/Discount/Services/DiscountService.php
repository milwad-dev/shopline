<?php

namespace Modules\Discount\Services;

use Modules\Discount\Enums\DiscountTypeEnum;
use Modules\Discount\Models\Discount;
use Modules\Discount\Repositories\DiscountRepoEloquentInterface;

class DiscountService
{
    /**
     * Store discount & sync discount to products by array of data.
     *
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        $discount = $this->query()->create([
            'user_id' => auth()->id(),
            'code' => $data['code'],
            'percent' => $data['percent'],
            'usage_limitation' => $data['usage_limitation'],
            'expire_at' => $this->setExpiredAt($data["expire_at"]),
            'link' => $data['link'],
            'type' => $data['type'],
            'description' => $data['description'],
            'uses' => 0
        ]);
        $this->syncDiscountToProducts($discount, $data["products"]);

        return $discount;
    }

    /**
     * Update discount with sync to products by id & array of data.
     *
     * @param array $data
     * @param int $id
     * @return null
     */
    public function update(array $data, int $id)
    {
        $discount = resolve(DiscountRepoEloquentInterface::class)->findById($id);
        $discount->update([
            "code" => $data["code"],
            "percent" => $data["percent"],
            "usage_limitation" => $data["usage_limitation"],
            "expire_at" => $this->setExpiredAt($data["expire_at"]),
            "link" => $data["link"],
            "type" => $data["type"],
            "description" => $data["description"],
        ]);

        $this->syncDiscountToProducts($discount, $data["products"]);

        return $discount;
    }

    # Private methods

    /**
     * Get query for article model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Discount::query();
    }

    /**
     * Sync discount & products.
     *
     * @param  $discount
     * @param  $products
     * @return void
     */
    private function syncDiscountToProducts($discount, $products): void
    {
        $discount->type === DiscountTypeEnum::TYPE_SPECIAL->value
            ? $discount->products()->sync($products)
            : $discount->products()->sync([]);
    }

    /**
     * Set expire_at.
     *
     * @param  $expire_at
     * @return \Carbon\Carbon|null
     */
    private function setExpiredAt($expire_at)
    {
        return $expire_at ?: null;
    }
}
