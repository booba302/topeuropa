<?php

namespace App\Imports;

use App\Products;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            'category' => $row['categoria'],
            'line' => $row['linea'],
            'sku' => $row['sku'],
            'ean' => $row['ean'],
            'price' => $row['coste'],
            'stock' => $row ['stock'],
            'title' => $row['titulo'],
            'desc' => $row['descripcion'],
            'i_1' => $row['items_i'],
            'i_2' => $row['items_ii'],
            'i_3' => $row['items_iii'],
            'i_4' => $row['items_iv'],
            'i_5' => $row['items_v'],
            'generic_keyword' => $row['generics_keywors'],
            'platinum_keyword' => $row['platinums_keywords']
        ]);
    }
}
