<?php

namespace Modules\Cart\Services;

interface CartServiceInterface
{
    public function add($productId);
    public function update();
    public function remove($productId);
    public function removeAll($productIds);
    public function check($id);
}
