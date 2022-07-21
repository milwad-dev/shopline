<?php

namespace Modules\Auth\Repositories;

use Modules\Auth\Models\Auth;
use Modules\Share\Contracts\Interface\RepositoriesInterface;
use Modules\Share\Repositories\ShareRepo;

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
