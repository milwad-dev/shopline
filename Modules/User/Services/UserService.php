<?php

namespace Modules\User\Services;

use Illuminate\Support\Facades\Hash;
use Modules\User\Models\User;

class UserService
{
    /**
     * Store user by request.
     *
     * @param  $request
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function store($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);
    }

    /**
     * Update user with id by request.
     *
     * @param  $request
     * @param  $id
     * @return int
     */
    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
        ]);
    }

    /**
     * Get model(User) query, builder.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function query()
    {
        return User::query();
    }
}
