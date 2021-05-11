<?php

namespace App\Imports;
use App\Personal;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //Para que reconozca con cabeceras $row['email'], 

class FirstSheetImport implements WithHeadingRow,ToCollection
{
    /**
    * @param Collection $collection
    */
    
    public function collection(Collection $rows)
    {   
        foreach ($rows as $row) 
        {
           if ($this->validar($row)) {
                $this->set_personal($row);
            }
        }
    }
    
    public function validar($row){
         $estado=true;
         if ( $row['dni']=='' || $row['nombres']=='' || $row['apellido_paterno']=='' || $row['apellido_materno']=='') 
             $estado=false;
         else{
             $dni = Personal::where('dni', $row['dni'] )->first();
             if($dni){//si ya existe el dni
                $estado=false;
             }
         }

         return $estado;
     }
 
     public function set_personal($row){
         $query=Personal::where("dni",$row['dni'])->first();
         if(!$query){
             $query = new Personal;
             $query->dni= $row['dni'];
         }
         $query->nombres= $row['nombres'];
         $query->apellido_paterno= $row['apellido_paterno'];
         $query->apellido_materno= $row['apellido_materno'];
         $query->email= $row['email'];
         $query->celular= $row['celular'];
         $query->tipo_id= $row['tipo'];
         $query->estado = 1;
         //$query->tipo_diploma_id= $row['tipo_diploma'];
         $query->save();
         
     }
}
