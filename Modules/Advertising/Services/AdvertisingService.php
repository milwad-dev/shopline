<?php

namespace Modules\Advertising\Services;

use Modules\Advertising\Models\Advertising;

class AdvertisingService implements AdvertisingServiceInterface
{
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

    public function update(array $data, $id)
    {
        return $this->query()->where('id', $id)->update([
            'media_id'  => $data['media_id'],
            'link'      => $data['link'],
            'title'     => $data['title'],
            'location'  => $data['location'],
            'status'    => $data['status'],
        ]);
    }

    public function updateStatus($id, string $status)
    {
        return $this->query()->where('id', $id)->update(['status' => $status]);
    }

    private function query()
    {
        return Advertising::query();
    }
}
