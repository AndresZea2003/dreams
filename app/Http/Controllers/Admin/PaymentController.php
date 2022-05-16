<?php

namespace App\Http\Controllers\Admin;

use App\DTO\PaymentData;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
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
