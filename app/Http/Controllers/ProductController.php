<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use function view;

class ProductController extends Controller
{
    public function index(): view
    {
        $products = Product::search()->paginate(12);
        return view('products.index', compact('products'));
    }

    public function show(Product $product): view
    {
        return view('products.show', compact('product'));
    }
}
