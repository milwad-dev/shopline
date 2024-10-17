<?php

namespace Modules\About\Services;

use Modules\About\Models\About;

class AboutService
{
    /**
     * Store about by array of data.
     *
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->query()->create([
            'body' => $data['body'],
        ]);
    }

    /**
     * Update about.
     *
     *
     * @return int
     */
    public function update($about, $body)
    {
        return $about->update(['body' => $body]);
    }

    /**
     * Get query model(builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return About::query();
    }
}
