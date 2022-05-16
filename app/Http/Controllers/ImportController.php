<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Imports\UpdateProductImport;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index(): View
    {
        return view('imports');
    }

    public function import(Request $request): RedirectResponse
    {
        Excel::import(new ProductImport(), $request->file('products'));

        return redirect(route('imports'))->with('succes', 'All good');
    }

    public function updateImport(Request $request): RedirectResponse
    {
        $products = Excel::toCollection(new UpdateProductImport(), $request->file('products'));

        foreach ($products[0] as $product) {
            Product::where('id', $product[0])->update([
                'name' => $product[2],
                'description' => $product[3],
                'price' => $product[4],
                'available' => $product[5],
            ]);
        }
        return redirect()->route('imports')->with('info', 'Importación realizada con éxito');
    }
}
