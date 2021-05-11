<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Personal;
use App\Cita;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PersonalImport;
use App\Exports\PersonalExport;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }
    
    public function index()
    {   
        $query = Personal::where("estado","0")->orderBy('id','desc')->get();
        return view('admin.index',compact('query'));
    }

    public function cambiar_estado(Request $request){
        
        $tra = Personal::find($request->id);
        $tra->estado = 1;
        $tra->save();
        return $request->id;
    }

    public function citas(){
        $query = Cita::where("estado","0")->get();
        $array_hora = $this->array_hora();
        return view('admin.citas',compact('query','array_hora'));
    }
    public function atenciones(){
        $query = Cita::where("estado","1")->orderBy('updated_at','desc')->get();
        $array_hora = $this->array_hora();
        return view('admin.atenciones',compact('query','array_hora'));
    }

    public function bd(){
        $query = Personal::orderBy('id','desc')->get();
        return view('admin.bd',compact('query'));
    }
    public function bd_importar(Request $r){
        Excel::import(new PersonalImport, $r->file('file'));
    }

    

    
    public function citas_exportar(){
        $data["citas"] = Cita::get();
        $data["ruta"] = "exportar.citas";
        $data["hora"] = $this->array_hora();
        $data["dia"] = ['1'=>'11 de mayo del 2021', '2'=>'12 de mayo del 2021'];
        //return (new ProcesosExport ($data))->view();
        return (new PersonalExport($data))->download("citas_2021".'.xlsx');
    }

    public function citas_exportar_view(){
        $data["citas"] = Cita::get();
        $data["dia"] = ['1'=>'11 de mayo del 2021', '2'=>'12 de mayo del 2021'];
        $data["hora"] = $this->array_hora();
        $data["ruta"] = "exportar.citas";
        return (new PersonalExport ($data))->view();
        //return (new ProcesosExport($data))->download("postulantes_".$data['proceso']->cod.'.xlsx');
    }


    public function actualizar_cita(Request $request){
        $tra = Cita::find($request->id);
        $tra->estado = 1;
        $tra->save();
        return $request->id;
    }   
    private function array_hora(){
        return [
            "8:30AM",
            "10:00AM",
            "11:00AM",
            "12:00PM",
            "1:00PM",
            "2:00PM",
            "3:00PM",
        ];
    }

   
}
