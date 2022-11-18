<?php

namespace Modules\Payment\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Payment\Models\Payment;
use Modules\Share\Http\Controllers\Controller;
use Modules\Share\Services\ShareService;

class PaymentController extends Controller
{
    /**
     * Callback from gateway.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callback(Request $request)
    {
        $gateway = resolve(Gateway::class);
        $paymentRepo = new PaymentRepo();
        $payment = $paymentRepo->findByInvoiceId($gateway->getInvoiceIdFromRequest($request));

        if (! $payment) {
            ShareService::errorToast('تراکنش ناموفق');
            return redirect('/');
        }

        $result = $gateway->verify($payment);

        if (is_array($result)) {
            newFeedback('عملیات ناموفق' , $result['message'] , 'error');
            $paymentRepo->changeStatus($payment->id , Payment::STATUS_FAIL);
            return redirect()->to($payment->paymentable->path());
        } else {
            event(new PaymentWasSuccessful($payment));
            newFeedback('عملیات موفق', 'پرداخت با موفقیت انجام شد', 'success');
            $paymentRepo->changeStatus($payment->id, Payment::STATUS_SUCCESS);
        }

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
}
