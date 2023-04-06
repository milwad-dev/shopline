<?php

namespace Modules\Home\Repositories\Advertising;

use Modules\Advertising\Models\Advertising;
use Modules\Home\Repositories\Product\ProductRepoEloquentInterface;

class AdvertisingRepoEloquent implements ProductRepoEloquentInterface
{
    /**
     * Get advertisings by location.
     *
     * @param string $location
     *
     * @return mixed
     */
    public function getAdvertisingsByLocation(string $location)
    {
        return Advertising::query()
            ->active()
            ->where('location', $location);
    }
}
