<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Imports\UpdateProductImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('imports');
    }

    public function import(Request $request)
    {
        Excel::import(new ProductImport(), $request->file('products'));

        return redirect(route('imports'))->with('succes', 'All good');
    }

    public function updateImport(Request $request)
    {
        $products = Excel::toCollection(new ProductImport(), $request->file('products'));

        foreach ($products[0] as $product) {
            Product::where('id', $product['id'])->update
            ([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'available' => $product['available'],
            ]);
        }
        return redirect()->route('imports')->with('info', 'Importación realizada con éxito');
    }
}
