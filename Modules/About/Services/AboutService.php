<?php

namespace Modules\About\Services;

use Modules\About\Models\About;

class AboutService
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
        return About::query();
    }
}
        