<?php

namespace Modules\Contact\Services;

use Modules\Contact\Models\Contact;

class ContactService implements ContactServiceInterface
{
    /**
     * Update is_read to true.
     *
     * @param Contact $contact
     *
     * @return bool
     */
    public function updateIsRead(Contact $contact)
    {
        return $contact->update(['is_read' => 1]);
    }
}
