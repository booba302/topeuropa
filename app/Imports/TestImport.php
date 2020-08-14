<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestImport implements toCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        return $rows;
    }  
}
