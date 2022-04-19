<?php

namespace App\Http\Controllers;

use App\DTO\PaymentData;
use App\Models\Payment;
use App\Requests\CreateSessionRequest;
use App\Requests\GetInformationRequest;
use App\Services\WebcheckoutService;

use App\Models\invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = PaymentData::collection(Payment::paginate(7))->toArray();
//        $links = Payment::paginate(2)->links();
//        dd($payments);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $payment = new Payment;

        $data = [
            'payment' => [
                'reference' => $request->input('reference'),
                'description' => $request->input('description'),
                'amount' => [
                    'currency' => 'COP',
                    'total' => $request->input('amount'),
                ],
            ],
            'returnUrl' => 'http://dreams.test/payments/'.$request->input('invoice_id'),
            'expiration' => date('c', strtotime('+2 days')),
        ];

        $webcheckout = (new WebcheckoutService())->createSession($data);
        $session_id = $webcheckout['requestId'];
        $process_url = $webcheckout['processUrl'];


        $payment->Reference = $data['payment']['reference'];
        $payment->description = $data['payment']['description'];
        $payment->amount = $request->input('amount');
        $payment->process_url = $process_url;
        $payment->request_id = $session_id;
        $payment->user_id = auth()->user()->id;
        $payment->invoice_id = $request->input('invoice_id');

        $responseGetSession = $webcheckout = (new WebcheckoutService())->getInformation($session_id);

        $payment->status = $responseGetSession['status']['status'];

        $payment->save();


        return redirect($process_url);
    }

    public function show(Payment $payment)
    {
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, Payment $payment)
    {
        $session_id = $payment->attributesToArray()['request_id'];

        $responseGetSession = (new WebcheckoutService())->getInformation($session_id);

//        $payment->reference = $request->reference;

        $payment->status = $responseGetSession['status']['status'];

//        dd($session_id);
//        dd($responseGetSession['requestId']);

        $payment->save();
        return redirect('http://dreams.test/payments/'.$payment->id);
    }

    public function destroy($id)
    {
        //
    }
    public function TryPayment(Payment $payment)
    {
        return redirect($payment->attributesToArray()['process_url']);
    }
}
