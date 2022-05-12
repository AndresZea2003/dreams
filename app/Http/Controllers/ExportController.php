<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
//        $initialDate = $request->query('initialDate');
//        $finalDate = $request->query('finalDate');
//        $status = $request->query('status');
//        $name = $request->input('name');

//        return Excel::download(new ProductExport($initialDate, $finalDate, $status), 'todos.xlsx');
        return Excel::download(new ProductsExport(), 'products.xlsx');
    }
}
