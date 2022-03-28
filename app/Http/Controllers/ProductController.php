<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use function view;

class ProductController extends Controller
{
    public function index(): view
    {
        $response = Http::get('dreams.test/api/products');
        $products = $response->json();
        $links = $products['links'];
        return view('products.index', compact('products', 'links'));
    }
    public function show(Product $product): view
    {
        return view('products.show', compact('product'));
    }
}
