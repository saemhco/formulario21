<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Personal;
use App\Cita;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function api_reniec($dni){
        $respuesta = Http::get('https://api.reniec.cloud/dni/'.$dni);
        //$respuesta->throw();
        if (array_key_exists('dni',  $respuesta->json() )) {
           
            return [
                'nombres'           => html_entity_decode($respuesta->json()['nombres']),
                'apellido_paterno'  => html_entity_decode($respuesta->json()['apellido_paterno']),
                'apellido_materno'  => html_entity_decode($respuesta->json()['apellido_materno']),
            ];
        }
        return "error";
    }
    public function search_personal($dni){
        $personal = Personal::where('dni',$dni)->first();
        
        //$personal->throw();
        if ($personal) {
            $cita = Cita::where('personal_id',$personal->id)->first();
            if($cita){
                $array_dia=["1"=>"Martes 30 de Marzo del 2021","2"=>"Miercoles 31 de Marzo del 2021",];
                return view('welcome.datos',compact('cita','array_dia'));
            }
            if( (boolean)$personal->estado){
                session()->put('id_temp', $personal->id);
                return view('welcome.formulario',compact('personal'));
            }else{
                return view('welcome.datos2',compact('personal'));
            }
            
           
        }
        return "error";
    }
    public function registrar_cita(Request $r){
        //session()->put('dni_temp', "4612345");
        $id = session('id_temp'); 
        $query = Cita::find($id);
        if($query) return false;
        $q= new Cita;
        $q->personal_id=$id;
        $q->dia=$r->dia;
        $q->turno='2';
        $q->hora='hora';
        $q->save();
        session()->forget('id_temp');
        return $q->personal->dni;

        
    }
    
}
