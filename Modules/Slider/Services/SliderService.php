<?php

namespace Modules\Slider\Services;

use Modules\Slider\Models\Slider;

class SliderService
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
        return Slider::query();
    }
}
        