<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Payment\Enums\PaymentStatusEnum;
use Modules\Payment\Gateways\Gateway;
use Modules\Payment\Models\Payment;
use Modules\Payment\Repositories\PaymentRepoEloquentInterface;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class PaymentController extends Controller
{
    protected PaymentRepoEloquentInterface $repo;

    public function __construct(PaymentRepoEloquentInterface $paymentRepoEloquent)
    {
        $this->repo = $paymentRepoEloquent;
    }

    /**
     * Callback from gateway.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request)
    {
        $gateway = resolve(Gateway::class);
        $payment = $this->repo->findByInvoiceId($gateway->getInvoiceIdFromRequest($request));

        if (! $payment) {
            ShareService::errorToast('Fail transaction');
            return redirect('/');
        }

        $result = $gateway->verify($payment);

        if (is_array($result)) {
            $this->changeStatus($payment, PaymentStatusEnum::STATUS_FAIL->value);

            ShareService::errorToast('Fail payment');
            return redirect()->to($payment->paymentable->path());
        }

//        event(new PaymentWasSuccessful($payment));
        $this->changeStatus($payment, PaymentStatusEnum::STATUS_SUCCESS->value);

        ShareService::successToast('Success payment');
        return redirect()->to($payment->paymentable->path());
    }

    public function index(PaymentRepo $paymentRepo , Request $request)
    {
        $this->authorize("manage", Payment::class);
        $payments = $paymentRepo
            ->searchEmail($request->email)
            ->searchAmount($request->amount)
            ->searchInvoiceId($request->invoice_id)
            ->searchAfterDate(dateFromJalali($request->start_date))
            ->searchBeforeDate(dateFromJalali($request->end_date))
            ->paginate();
        $last30DaysTotal = $paymentRepo->getLastNDaysTotal(-30);
        $last30DaysBenefit = $paymentRepo->getLastNDaysSiteBenefit(-30);
        $last30DaysSellerShare = $paymentRepo->getLastNDaysSellerShare(-30);
        $totalSell = $paymentRepo->getLastNDaysTotal();
        $totalBenefit = $paymentRepo->getLastNDaysSiteBenefit();
        $dates = collect();
        foreach (range(-30, 0) as $i) {
            $dates->put(now()->addDays($i)->format("Y-m-d"), 0);
        }
        $summery =  $paymentRepo->getDailySummery($dates);
        return view("Payment::index", compact("payments", "last30DaysTotal", "last30DaysBenefit", "totalSell",
            "totalBenefit", "last30DaysSellerShare", "summery", "dates"));
    }

    public function purchases()
    {
        $payments = auth()->user()->payments()->with('paymentable')->paginate();
        return view('Payment::purchases.index' , compact('payments'));
    }

    /**
     * Change payment status.
     *
     * @param  $payment
     * @param  string $status
     * @return \Illuminate\Http\RedirectResponse
     */
    private function changeStatus($payment, string $status): \Illuminate\Http\RedirectResponse
    {
        $this->repo->changeStatus($payment->id, $status);
    }
}
