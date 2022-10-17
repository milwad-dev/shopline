<?php

namespace Modules\Cart\Services;

interface CartServiceInterface
{
    public function add($productId);
    public function update();
    public function remove();
    public function removeAll();
    public function check($id);
}
