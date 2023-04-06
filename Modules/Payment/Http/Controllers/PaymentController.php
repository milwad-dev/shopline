<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Payment\Enums\PaymentStatusEnum;
use Modules\Payment\Gateways\Gateway;
use Modules\Payment\Repositories\PaymentRepoEloquentInterface;
use Modules\Payment\Services\PaymentService;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;
use Modules\Share\Traits\SuccessToastMessageWithRedirectTrait;

class PaymentController extends Controller
{
    use SuccessToastMessageWithRedirectTrait;

    private string $redirectRoute = 'payments.index';

    protected PaymentRepoEloquentInterface $repo;

    public function __construct(PaymentRepoEloquentInterface $paymentRepoEloquent)
    {
        $this->repo = $paymentRepoEloquent;
    }

    /**
     * Callback from gateway.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request)
    {
        $gateway = resolve(Gateway::class);
        $payment = $this->repo->findByInvoiceId($gateway->getInvoiceIdFromRequest($request));
        $result = $gateway->verify($payment);

        if (is_array($result)) {
            $this->changeStatus($payment, PaymentStatusEnum::STATUS_FAIL->value);

            ShareService::errorToast('Fail payment');

            return redirect()->to($payment->paymentable->path());
        }

//       TODO event(new PaymentWasSuccessful($payment));
        $this->changeStatus($payment, PaymentStatusEnum::STATUS_SUCCESS->value);

        $this->redirectRoute = $payment->paymentable->path();

        return $this->successMessageWithRedirect('Success payment');
    }

    /**
     * Change payment status.
     *
     * @param        $payment
     * @param string $status
     *
     * @return void
     */
    private function changeStatus($payment, string $status): void
    {
        resolve(PaymentService::class)->changeStatus($payment->id, $status);
    }
}
