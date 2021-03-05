<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ImportOutlet implements ToArray, WithHeadingRow
{


    public function array(array $array)
    {
        return $array[0]; //0 means first sheet
    }
}
