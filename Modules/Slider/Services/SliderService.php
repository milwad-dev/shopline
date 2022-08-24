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
            'media_id'  => $data['media_id'],
            'link'      => $data['link'],
            'status'    => $data['status'],
        ]);
    }

    /**
     * Update slider by id & data.
     *
     * @param  array $data
     * @param  $id
     * @return int
     */
    public function update(array $data, $id)
    {
        return $this->query()->where('id', $id)->update([
            'media_id'  => $data['image'],
            'link'      => $data['link'],
            'status'    => $data['status'],
        ]);
    }

    /**
     * Get query model (builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Slider::query();
    }
}
