<?php

namespace Modules\Panel\Repositories;

use Modules\Share\Contracts\Interface\RepositoriesInterface;
use Modules\Share\Repositories\ShareRepo;
use Modules\Panel\Models\Panel;

class PanelRepo implements RepositoriesInterface
{
    private string $class = Panel::class;

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
