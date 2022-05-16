<?php

namespace App\Http\Controllers;

use App\DTO\PaymentData;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        $paymentsCount = Payment::all()->count();
        $paymentsRejected = Payment::all()->where('status', 'REJECTED')->count();
        $paymentsPending = Payment::all()->where('status', 'PENDING')->count();
        $paymentsApproved = Payment::all()->where('status', 'APPROVED')->count();
        $payments = PaymentData::collection(Payment::paginate(7))->toArray();

        $productsCount = Product::all()->count();
        $productsDisabled = DB::table('products')
            ->whereNotNull('disabled_at')
            ->get()->count();
        $products = Product::all();
        $productsRecent = Product::all()->sortByDesc('created_at')->take(1)->toJson();

        $usersCount = User::all()->count();
        $usersDisabled = DB::table('users')
            ->whereNotNull('disabled_at')
            ->get()->count();
        $usersVerified = DB::table('users')
            ->whereNotNull('email_verified_at')
            ->get()->count();
        $userRecent = User::all()->sortByDesc('created_at')->take(1)->toJson();
        $users = User::all();

        return view('reports.index', compact(
            'payments',
            'paymentsCount',
            'paymentsApproved',
            'paymentsPending',
            'paymentsRejected',
            'productsCount',
            'productsDisabled',
            'productsRecent',
            'products',
            'usersCount',
            'usersDisabled',
            'usersVerified',
            'userRecent',
            'users'
        ));
    }
}
