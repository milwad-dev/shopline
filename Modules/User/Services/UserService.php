<?php

namespace Modules\User\Services;

use Modules\User\Models\User;

class UserService
{
    public function store($request)
    {
        return $this->query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'password' => $request->password,
        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'type' => $request->type,
            'password' => $request->password,
        ]);
    }

    private function query()
    {
        return User::query();
    }
}
