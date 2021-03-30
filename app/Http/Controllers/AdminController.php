<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Personal;
use App\Cita;

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

    public function actualizar_cita(Request $request){
        $tra = Cita::find($request->id);
        $tra->estado = 1;
        $tra->save();
        return $request->id;
    }   
    private function array_hora(){
        return [
            "9:00AM",
            "9:00AM",
            "10:00AM",
            "10:00AM",
            "11:00AM",
            "11:00AM",
            "12:00PM",
            "12:00PM",
            "1:00PM",
            "1:00PM",
            "2:00PM",
        ];
    }

   
}
