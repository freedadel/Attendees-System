<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Session;

class CustomersImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'name' => $row[0],
            'identity' => $row[2],
            'origin' => $row[3],
            'address' => $row[4],
            'phone' => $row[1],
            'home_no' => $row[5],
            'status' => 1,
            'numbers' => $row[6],
            'comments' => $row[7],
            'user_id'=> auth()->user()->id,
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
