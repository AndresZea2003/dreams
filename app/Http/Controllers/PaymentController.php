<?php

namespace App\Http\Controllers;

use App\DTO\PaymentData;
use App\Models\Invoice;
use App\Models\Payment;
use App\Services\WebcheckoutService;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class PaymentController extends Controller
{
    public function index(): view
    {
        $payments = PaymentData::collection(Payment::paginate(7))->toArray();
//        $links = Payment::paginate(2)->links();
//        dd($payments);
//        return view('payments.index', compact('payments'));
        $user_id = auth()->user()->id;
        $payments = Payment::all()->where('user_id', $user_id)->toArray();
        $count = Payment::all()->where('user_id', $user_id)->count();
//        dd($payments);
        return view('payments.index', compact('payments', 'count'));
    }

    public function store(Request $request): RedirectResponse
    {
        $payment = new Payment();

        $data = [
            'payment' => [
                'reference' => $request->input('reference'),
                'description' => $request->input('description'),
                'amount' => [
                    'currency' => 'COP',
                    'total' => $request->input('amount'),
                ],
            ],
            'returnUrl' => route('payments.show', $request->input('invoice_id')),
            'expiration' => date('c', strtotime('+2 days')),
        ];

        $webcheckout = (new WebcheckoutService())->createSession($data);
        $session_id = $webcheckout['requestId'];
        $process_url = $webcheckout['processUrl'];

        $payment->reference = $data['payment']['reference'];
        $payment->description = $data['payment']['description'];
        $payment->amount = $request->input('amount');
        $payment->process_url = $process_url;
        $payment->request_id = $session_id;
        $payment->user_id = auth()->user()->id;
        $payment->invoice_id = $request->input('invoice_id');

//        $responseGetSession = $webcheckout = (new WebcheckoutService())->getInformation($session_id);

        $payment->status = Invoice::PENDING;

        $payment->save();

        return redirect($process_url);
    }

    public function show(Payment $payment): view
    {
        return view('payments.show', compact('payment'));
    }


    public function update(Request $request, Payment $payment): RedirectResponse
    {
        $session_id = $payment->attributesToArray()['request_id'];

        $responseGetSession = (new WebcheckoutService())->getInformation($session_id);

//        $payment->reference = $request->reference;

        $payment->status = $responseGetSession['status']['status'];

//        dd($session_id);
//        dd($responseGetSession['requestId']);

        $payment->save();
        return redirect('http://dreams.test/payments/' . $payment->id);
    }

    public function TryPayment(Payment $payment): RedirectResponse
    {
        return redirect($payment->attributesToArray()['process_url']);
    }
    public function getRequestInformation(Request $request)
    {
//        $responseGetSession = (new WebcheckoutService())->getInformation(54358);
//        dd('hola');

//        return redirect('http://dreams.test/payments/' . $payment->id);

//        $payment = new Payment();
//
//        $data = [
//            'payment' => [
//                'reference' => $request->input('reference'),
//                'description' => $request->input('description'),
//                'amount' => [
//                    'currency' => 'COP',
//                    'total' => $request->input('amount'),
//                ],
//            ],
//            'returnUrl' => route('payments.show', $request->input('invoice_id')),
//            'expiration' => date('c', strtotime('+2 days')),
//        ];
//
//        $webcheckout = (new WebcheckoutService())->createSession($data);
//        $session_id = $webcheckout['requestId'];
//        $process_url = $webcheckout['processUrl'];
//
//        $payment->reference = $data['payment']['reference'];
//        $payment->description = $data['payment']['description'];
//        $payment->amount = $request->input('amount');
//        $payment->process_url = $process_url;
//        $payment->request_id = $session_id;
//        $payment->user_id = auth()->user()->id;
//        $payment->invoice_id = $request->input('invoice_id');
//
//        $responseGetSession = $webcheckout = (new WebcheckoutService())->getInformation($session_id);
//
//        $payment->status = Invoice::PENDING;
//
//        $payment->save();
//
//        return redirect($process_url);
    }
}
