<?php

namespace Modules\About\Services;

use Modules\About\Models\About;

class AboutService
{
    /**
     * Store about by array of data.
     *
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->query()->create(['body' => $data['body']]);
    }

    /**
     * Update about by id & array of data.
     *
     * @param  array $data
     * @param  $id
     * @return int
     */
    public function update(array $data, $id)
    {
        return $this->query()->where('id', $id)->update(['body' => $data['body']]);
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
