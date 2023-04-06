<?php

namespace Modules\Home\Services\Contact;

use Modules\Contact\Models\Contact;

class ContactService
{
    /**
     * Store contact by data.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store(array $data)
    {
        return Contact::query()->create([
            'name'    => $data['name'],
            'email'   => $data['email'],
            'phone'   => $data['phone'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);
    }
}
