<?php

namespace Modules\Discount\Services;

use Modules\Discount\Models\Discount;

class DiscountService
{
    public function store($request)
    {
        return $this->query()->create([

        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->whereId($id)->update([

        ]);
    }

    private function query()
    {
        return Discount::query();
    }
}
        