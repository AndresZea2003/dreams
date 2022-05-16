<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class UpdateProductImport implements ToModel
{
    public function model(array $row): Product
    {
        return new Product([
            'photo' => 'images/products/defaultFile.jpeg',
            'name' => $row[2],
            'description' => $row[3],
            'price' => $row[4],
            'available' => $row[5],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:25|alpha_num',
            'description' => 'required|min:3|max:225|alpha_num',
            'price' => 'required|alpha_num|integer',
            'available' => 'required|integer',
        ];
    }

    public function uniqueBy(): string
    {
        return 'name';
    }
}
