<?php

namespace Modules\Discount\Services;

use Modules\Discount\Enums\DiscountTypeEnum;
use Modules\Discount\Models\Discount;
use Modules\Discount\Repositories\DiscountRepo;

class DiscountService
{
    public function store(array $data)
    {
        $discount = $this->query()->create([
            'user_id' => auth()->id(),
            'code' => $data['code'],
            'percent' => $data['percent'],
            'usage_limitation' => $data['usage_limitation'],
            'expire_at' => $data['expire_at'] ? Jalalian::fromFormat('Y/m/d H:i', $data['expire_at'])->toCarbon() : null,
            'link' => $data['link'],
            'type' => $data['type'],
            'description' => $data['description'],
            'uses' => 0
        ]);
        if ($discount->type === DiscountTypeEnum::TYPE_SPECIAL->value) {
            $discount->products()->sync($data['courses']);
        }

        return $discount;
    }

    public function update(array $data, int $id)
    {
        $discount = resolve(DiscountRepo::class)->findById($id);

        Discount::query()->where('id' , $id)->update([
            "code" => $data["code"],
            "percent" => $data["percent"],
            "usage_limitation" => $data["usage_limitation"],
            "expire_at" => $data["expire_at"] ? Jalalian::fromFormat("Y/m/d H:i", $data["expire_at"])->toCarbon() : null,
            "link" => $data["link"],
            "type" => $data["type"],
            "description" => $data["description"],
        ]);

        $this->syncDiscountToProducts($discount, $data["products"]);

        return $discount;
    }

    # Private methods

    private function query()
    {
        return Discount::query();
    }

    private function syncDiscountToProducts($discount, $products): void
    {
        if ($discount->type === DiscountTypeEnum::TYPE_SPECIAL->value) {
            $discount->products()->sync($products);
        } else {
            $discount->products()->sync([]);
        }
    }
}
