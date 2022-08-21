<?php

namespace Modules\User\Repositories;

use Modules\User\Models\User;

class UserRepoEloquent implements UserRepoEloquentInterface
{
    /**
     * Get the latest users without id.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getLatestWithoutId(int $id)
    {
        return $this->query()->where('id', '!=', $id)->latest();
    }

    /**
     * Find user by email address.
     *
     * @param string $email
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     *
     */
    public function findByEmail(string $email)
    {
        return $this->query()->where('email', $email)->first();
    }

    /**
     * Find user by id.
     *
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById(int $id)
    {
        return $this->query()->findOrFail($id);
    }

    /**
     * Delete user by id.
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->query()->where('id', $id)->delete();
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
