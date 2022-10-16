<?php

namespace Modules\Contact\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Modules\Contact\Models\Contact;

class ContactRepoEloquent implements ContactRepoInterface
{
    /**
     * Get latest contacts.
     *
     * @return Builder
     */
    public function getLatest()
    {
        return $this->query()->latest();
    }

    /**
     * Get query model(builder).
     *
     * @return Builder
     */
    private function query()
    {
        return Contact::query();
    }
}
