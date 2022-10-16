<?php

namespace Modules\Contact\Services;

use Modules\Contact\Models\Contact;

class ContactService
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
        return Contact::query();
    }
}
        