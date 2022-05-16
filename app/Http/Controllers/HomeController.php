<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
            $products = DB::table('products')
                ->orderBy('id', 'desc')
                ->paginate(4);
        return view('home.index', compact('products'));
    }
}
