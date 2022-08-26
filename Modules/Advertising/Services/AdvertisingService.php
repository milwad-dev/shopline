<?php

namespace Modules\Advertising\Services;

use Modules\Advertising\Models\Advertising;

class AdvertisingService
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
        return Advertising::query();
    }
}
        