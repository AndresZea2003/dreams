<?php

namespace App\Http\Controllers\Admin;

use App\DTO\PaymentData;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index(): View
    {
        $user_id = auth()->user()->id;
        $count = Payment::all()->count();

        $payments = PaymentData::collection(Payment::paginate(7))->toArray();

        $users = DB::table('users')
            ->select('id', 'name')
            ->get()
            ->toArray();

        return view('admin.payments.index', compact('payments', 'count', 'users'));
    }
}
