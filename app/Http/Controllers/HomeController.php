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
            if( (boolean) $cita){
                $array_dia=["1"=>"Martes 30 de Marzo del 2021","2"=>"Miercoles 31 de Marzo del 2021",];
                $array_hora=$this->array_hora();
                return view('welcome.datos',compact('cita','array_dia','array_hora'));
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
        $get_datos=$this->get_data($r->dia);
        $q->turno=$get_datos['turno'];
        $q->hora=$get_datos['hora'];
        $q->save();
        session()->forget('id_temp');
        return $q->personal->dni;
    }
    private function get_data($dia){
        $q=Cita::where('dia',$dia)->orderBy("id","desc")->first();
        if(!$q) return ['turno' =>1, 'hora'=>"0"];
        else{
           $hora = $q->hora;
           $q2=Cita::where('dia',$dia)->where("hora",$hora)->count();
           if($q2>=90){
            $hora++;
           }
           $turno=1+Cita::where('dia',$dia)->count();
           return ["turno"=>$turno,"hora"=>$hora];
        }
    }

    private function array_hora(){
        return [
            "8:00AM",
            "8:30AM",
            "9:00AM",
            "9:30AM",
            "10:00AM",
            "10:30AM",
            "11:00AM",
            "11:30AM",
            "12:00PM",
            "12:30PM",
            "1:00PM",
        ];
    }
    
}
