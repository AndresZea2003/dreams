<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use function response;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        Product::create($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Product saved correctly',
        ], 200);
    }
    public function show(Product $product)
    {
        return response()->json([
            'res' => true,
            'product' => $product,
        ], 200);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'res' => true,
            'msg' => 'Product updated successfully',
        ], 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'res' => true,
            'msg' => 'Product removed successfully',
        ], 200);
    }
}
