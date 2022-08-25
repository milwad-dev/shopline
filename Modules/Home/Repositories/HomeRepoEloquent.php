<?php

namespace Modules\Home\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\Slider\Models\Slider;

class HomeRepoEloquent implements HomeRepoEloquentInterface
{
    /**
     * Get latest sliders.
     *
     * @return Collection
     */
    public function getLatestSliders()
    {
        return Slider::query()
            ->where('status', SliderStatusEnum::STATUS_ACTIVE->value)
            ->latest()
            ->get();
    }
}
