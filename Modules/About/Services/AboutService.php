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
        return $this->query()->create(['body' => $this->replaceBody($data['body'])]);
    }

    /**
     * Update about.
     *
     * @param  $about
     * @param  $body
     * @return int
     */
    public function update($about, $body)
    {
        return $about->update(['body' => $this->replaceBody($body)]);
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

    /**
     * Replace body.
     *
     * @param  $body
     * @return string
     */
    private function replaceBody($body): string
    {
        return str_replace('"', '', $body);
    }
}
