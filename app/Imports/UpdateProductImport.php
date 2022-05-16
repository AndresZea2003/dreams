<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class UpdateProductImport implements ToModel
{
    public function model(array $row)
    {
        return new Product([


            'photo' => 'UPDATE',

            'name' => $row[2],
            'description' => $row[3],
            'price' => $row[4],
            'available' => $row[5],
        ]);
    }

    public function uniqueBy()
    {
        return 'name';
    }
}
