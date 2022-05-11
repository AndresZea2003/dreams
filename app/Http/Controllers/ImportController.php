<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
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
        Excel::import(new ProductImport(), $request->file('todo'));

        return redirect(route('imports'))->with('succes', 'All good');
    }
}
