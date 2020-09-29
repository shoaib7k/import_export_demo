<?php

namespace App\Imports;

use App\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CsvImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            'product_name' => $row["product_name"],
            'product_description' => $row["product_description"],
            'quantity' => $row["quantity"],
            'unit_price' => $row['unit_price']
        ]);
    }
}
