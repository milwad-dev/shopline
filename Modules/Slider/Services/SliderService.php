<?php

namespace Modules\Slider\Services;

use Modules\Slider\Models\Slider;

class SliderService implements SliderServiceInterface
{
    /**
     * Store slider by data.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->query()->create([
            'user_id'       => auth()->id(),
            'media_id'      => $data['media_id'],
            'link'          => $data['link'],
            'status'        => $data['status'],
            'title'         => $data['title'],
            'title_color'   => $data['title_color'],
        ]);
    }

    /**
     * Update slider by id & data.
     *
     * @param array  $data
     * @param Slider $slider
     *
     * @return bool
     */
    public function update(array $data, Slider $slider)
    {
        return $slider->update([
            'media_id'      => $data['media_id'],
            'link'          => $data['link'],
            'status'        => $data['status'],
            'title'         => $data['title'],
            'title_color'   => $data['title_color'],
        ]);
    }

    /**
     * Update status.
     *
     * @param Slider $slider
     * @param string $status
     *
     * @return bool
     */
    public function updateStatus(Slider $slider, string $status)
    {
        return $slider->update(['status' => $status]);
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
