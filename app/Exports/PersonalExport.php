<?php

namespace App\Exports;

use App\Personal;
use DB;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonalExport implements FromView
{
   
    use Exportable;
    
    public function __construct(array $data){
        $this->data = $data;
    }


    public function view(): View
    {
        return view($this->data["ruta"], [
            'data' => $this->data,
        ]);
    }



}
