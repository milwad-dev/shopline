<?php

namespace Modules\Auth\Services;

use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;

class RegisterService
{
    /**
     * Store user by request.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function storeUser(array $data)
    {
        return User::query()->create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'type'     => $data['type'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
