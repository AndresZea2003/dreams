<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\StoreProductRequest;
use App\Http\Requests\Admin\Products\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): view
    {
        return view('admin.products.index');
    }

    public function create(): view
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $product = new Product();
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $destinationPath = 'images/products/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('photo')->move($destinationPath, $fileName);
            $product->photo = $destinationPath . $fileName;
        } else {
            $product->photo = 'images/products/defaultFile.jpeg';
        }
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->available = $request->input('available');
        $product->description = $request->input('description');

        $product->save();

        return redirect(route('admin.products.store', $product));
    }

    public function show(Product $product): view
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product): view
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->all());
        $product->save();
        return response()->redirectToRoute('admin.products.index');
    }

    public function toggle(Product $product): RedirectResponse
    {
        if (!$product->disabled_at) {
            $product->disabled_at = now();
        } else {
            $product->disabled_at = null;
        }

        $product->save();

        return response()->redirectToRoute('admin.products.index');
    }
}
