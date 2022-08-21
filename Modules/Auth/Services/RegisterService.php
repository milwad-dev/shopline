<?php

namespace Modules\Auth\Services;

use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;

class RegisterService
{
    /**
     * Store user by request.
     *
     * @param  $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function storeUser($request)
    {
        return User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);
    }
}
