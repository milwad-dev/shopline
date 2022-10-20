<?php

namespace Modules\Cart\Services;

interface CartServiceInterface
{
    public function add($productId);
    public function remove($productId);
    public function removeAll();
    public function check($id);
}
