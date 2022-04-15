<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = Product::paginate(6);
        return response()->json($products, 200);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = new Product();
        $validatedData = $request->validated();

        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->available = $validatedData['available'];

        $product->save();
        return response()->json($product, 201);
    }
    public function show(Product $product): JsonResponse
    {
        return response()->json($product, 200);
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $validatedData = $request->validated();

        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->available = $validatedData['available'];

        $product->save();
        return response()->json($product, 202);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(null, 204);
    }
    public function toggle(Product $product)
    {
        if (!$product->disabled_at) {
            $product->disabled_at = now();
        } else {
            $product->disabled_at = null;
        }

        $product->save();
    }
}
