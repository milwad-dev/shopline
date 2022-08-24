<?php

namespace Modules\Slider\Services;

use Modules\Slider\Models\Slider;

class SliderService
{
    /**
     * Store slider by data.
     *
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->query()->create([
            'user_id'   => auth()->id(),
            'media_id'  => $data['image'],
            'link'      => $data['link'],
            'status'    => $data['status'],
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
