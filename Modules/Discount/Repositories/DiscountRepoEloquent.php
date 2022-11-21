<?php

namespace Modules\Discount\Repositories;

use Modules\Discount\Models\Discount;

class DiscountRepoEloquent implements DiscountRepoEloquentInterface
{
    /**
     * Get latest discounts.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getLatest()
    {
        return $this->query()->latest();
    }

    /**
     * Find by id.
     *
     * @param  int|string $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById(int|string $id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * Get query for article model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Discount::query();
    }
}
