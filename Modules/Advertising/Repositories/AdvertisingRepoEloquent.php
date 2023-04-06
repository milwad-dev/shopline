<?php

namespace Modules\Advertising\Repositories;

use Modules\Advertising\Models\Advertising;

class AdvertisingRepoEloquent implements AdvertisingRepoEloquentInterface
{
    /**
     * Get latest advertising (builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getLatest()
    {
        return $this->query()->latest();
    }

    /**
     * Find or fail advertising by id.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById(int $id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * Delete advertising by id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    /**
     * Get query model (builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Advertising::query();
    }
}
