<?php

namespace Modules\Payment\Services;

use Illuminate\Http\RedirectResponse;
use Modules\Payment\Enums\PaymentStatusEnum;
use Modules\Payment\Gateways\Gateway;
use Modules\Payment\Models\Payment;
use Modules\User\Models\User;

class PaymentService
{
    /**
     * Generate payments.
     *
     * @param  string $amount
     * @param  object $paymentable
     * @param  User $buyer
     * @param  int|string|null $seller_id
     * @param  array $discounts
     * @return false|RedirectResponse|Payment
     */
    public function generate(
        string $amount,
        object $paymentable,
        User $buyer,
        int|string $seller_id = null,
        array $discounts = []
    ) {
        if ($amount <= 0 || is_null($paymentable->id) || is_null($buyer->id)) {
            return false;
        }

        $gateway = resolve(Gateway::class);
        $invoiceId = $gateway->request($amount, $paymentable->title);
        if (is_array($invoiceId)) {
            return back();
        }

        if (is_null($paymentable->percent)) {
            $seller_p = $paymentable->percent;
            $seller_share = ($amount / 100 * $seller_p);
            $site_share = $amount - $seller_share;
        } else {
            $seller_p = $seller_share = 0;
            $site_share = $amount;
        }

        return $this->store([
            'buyer_id' => $buyer->id,
            'seller_id' => $seller_id,
            'paymentable_id' => $paymentable->id,
            'paymentable_type' => get_class($paymentable),
            'amount' => $amount,
            'invoice_id' => $invoiceId,
            'gateway' => $gateway->getName(),
            'status' => PaymentStatusEnum::STATUS_PENDING->value,
            'seller_p' => $seller_p,
            'seller_share' => $seller_share,
            'site_share' => $site_share,
        ], $discounts);
    }

    /**
     * Change status by id.
     *
     * @param  int $id
     * @param  string $status
     * @return int
     */
    public function changeStatus(int $id, string $status)
    {
        return Payment::query()
            ->where('id', $id)
            ->update(['status' => $status]);
    }

    # Private methods

    /**
     * Store payments.
     *
     * @param  array $data
     * @param  array $discounts
     * @return Payment
     */
    private function store(array $data, array $discounts = [])
    {
        $payments = Payment::query()->create([
            "buyer_id"          => $data['buyer_id'],
            "paymentable_id"    => $data['paymentable_id'],
            "paymentable_type"  => $data['paymentable_type'],
            "amount"            => $data['amount'],
            "seller_id"         => $data['seller_id'],
            "invoice_id"        => $data['invoice_id'],
            "gateway"           => $data['gateway'],
            "status"            => $data['status'],
            "seller_p"          => $data['seller_p'],
            "seller_share"      => $data['seller_share'],
            "site_share"        => $data['site_share'],
        ]);
        $this->syncDiscountToPayments($payments, $discounts);

        return $payments;
    }

    /**
     * Sync discount to payments.
     *
     * @param  Payment $payments
     * @param  array $discounts
     * @return Payment
     */
    private function syncDiscountToPayments(Payment $payments, array $discounts = [])
    {
        foreach ($discounts as $discount) {
            $discountIds[] = $discount->id;
        }
        if (isset($discountIds)) {
            $payments->discounts()->sync($discountIds);
        }

        return $payments;
    }
}
