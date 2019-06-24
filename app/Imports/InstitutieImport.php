<?php

namespace App\Imports;

use App\Institutie;
use Maatwebsite\Excel\Concerns\ToModel;

class InstitutieImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Institutie([
            'id'     => $row[0],
            'nume'    => $row[1], 
            'sectie' => $row[2],    
        ]);
    }
}
