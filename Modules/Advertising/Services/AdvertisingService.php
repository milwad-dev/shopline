<?php

namespace Modules\Advertising\Services;

use Modules\Advertising\Models\Advertising;

class AdvertisingService implements AdvertisingServiceInterface
{
    /**
     * Store advertising by data.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return $this->query()->create([
            'user_id'   => auth()->id(),
            'media_id'  => $data['media_id'],
            'link'      => $data['link'],
            'title'     => $data['title'],
            'location'  => $data['location'],
            'status'    => $data['status'],
        ]);
    }

    /**
     * Update advertising by id & data.
     *
     * @param array $data
     * @param int   $id
     *
     * @return int
     */
    public function update(array $data, int $id)
    {
        return $this->query()->where('id', $id)->update([
            'media_id'  => $data['media_id'],
            'link'      => $data['link'],
            'title'     => $data['title'],
            'location'  => $data['location'],
            'status'    => $data['status'],
        ]);
    }

    /**
     * Update status advertising by id.
     *
     * @param int    $id
     * @param string $status
     *
     * @return int
     */
    public function updateStatus(int $id, string $status)
    {
        return $this->query()->where('id', $id)->update(['status' => $status]);
    }

    /**
     * Get query model (builder).
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return Advertising::query();
    }
}
