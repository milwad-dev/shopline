<?php

namespace Modules\User\Repositories;

use Modules\User\Models\User;

class UserRepo
{
    public function findByEmail(string $email)
    {
        return $this->query()->where('email', $email)->first();
    }

    private function query()
    {
        return User::query();
    }
}
