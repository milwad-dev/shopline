<?php

namespace Modules\Auth\Repositories;

use Modules\Share\Contracts\Interface\RepositoriesInterface;
use Modules\Share\Repositories\ShareRepo;
use Modules\Auth\Models\Auth;

class AuthRepo implements RepositoriesInterface
{
    private string $class = Auth::class;

    public function index()
    {

    }

    public function findById($id)
    {

    }

    public function delete($id)
    {

    }

    private function query()
    {
        return ShareRepo::query($this->class);
    }
}
