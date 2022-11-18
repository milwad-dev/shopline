<?php

namespace Modules\Payment\Services;

use Modules\Payment\Models\Payment;

class PaymentService
{
    public function store($request)
    {
        return $this->query()->create([

        ]);
    }

    public function update($request, $id)
    {
        return $this->query()->whereId($id)->update([

        ]);
    }

    private function query()
    {
        return Payment::query();
    }
}
        