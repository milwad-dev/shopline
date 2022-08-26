<?php

namespace Modules\Advertising\Repositories;

use Modules\Advertising\Models\Advertising;

class AdvertisingRepoEloquent implements AdvertisingRepoEloquentInterface
{
    public function getLatest()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {
        return $this->query()->findOrFail($id);
    }

    public function delete($id)
    {
        return $this->query()->where('id', $id)->delete();
    }

    private function query()
    {
        return Advertising::query();
    }
}
