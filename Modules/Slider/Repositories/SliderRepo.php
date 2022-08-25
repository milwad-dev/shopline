<?php

namespace Modules\Slider\Repositories;

use Modules\Slider\Models\Slider;

class SliderRepo
{
    public function getLatest()
    {
        return $this->query()->latest();
    }

    public function findById($id)
    {

    }

    public function delete($id)
    {

    }

    private function query()
    {
        return Slider::query();
    }
}
