<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //Para que reconozca con cabeceras $row['email'], 
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;//varias hojas

class PersonalImport implements WithHeadingRow, WithMultipleSheets 
{
    
    
    
    
    public function sheets(): array
    {
        return [
            new FirstSheetImport()
        ];
    }
    
 }
