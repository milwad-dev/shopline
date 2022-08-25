<?php

namespace Modules\Home\Repositories\Home;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Category\Enums\CategoryStatusEnum;
use Modules\Category\Models\Category;
use Modules\Slider\Enums\SliderStatusEnum;
use Modules\Slider\Models\Slider;

class HomeRepoEloquent implements HomeRepoEloquentInterface
{
    /**
     * Get latest active sliders.
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

    /**
     * Get latest active categories.
     *
     * @return Collection
     */
    public function getLatestCategories()
    {
        return Category::query()
            ->where('status', CategoryStatusEnum::STATUS_ACTIVE->value)
            ->latest()
            ->get();
    }
}
