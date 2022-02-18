<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }
    public function create()
    {
        $response = Http::get('dreams.test/api/products');
        $products = $response->json();
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $response = Http::get('dreams.test/api/products');
        $products = $response->json();

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');

        $product->save();

        return redirect(route('admin.products.store', $product));
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $response = Http::get('dreams.test/api/products');
        $products = $response->json();

        $product->update($request->all());
        return response()->redirectToRoute('admin.products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->redirectToRoute('admin.products.index');
    }

    public function toggle(Product $product)
    {
        if (!$product->disabled_at) {
            $product->disabled_at = now();
        } else {
            $product->disabled_at = null;
        }

        $product->save();

        return response()->redirectToRoute('admin.product.index');
    }
}
