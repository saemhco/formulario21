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
        $query = Cita::where('personal_id',$id)->first();
        if($query) return false;
        $q= new Cita;
        $q->personal_id=$id;
        $get_datos=$this->get_data($r->dia);
        $q->dia=$get_datos['dia'];
        
        $q->turno=$get_datos['turno'];
        $q->hora=$get_datos['hora'];
        $q->save();
        session()->forget('id_temp');
        return $q->personal->dni;
    }
    private function get_data($dia){
        $q=Cita::where('dia',$dia)->orderBy("id","desc")->first();
        if(!$q) return ['turno' =>1, 'hora'=>"0", 'dia'=>$dia];
        else{
           $hora = $q->hora;
           $q2=Cita::where('dia',$dia)->where("hora",$hora)->count();
           if($q2>=90){//atenciones por hora
            $hora++;
           }
           if( (int)$hora>8){
                switch($dia){
                    case "1":  return $this->get_data(2); break;
                    case "2":  return $this->get_data(1); break;
                    default: break;
                }
               
           }
           $pacientes = Cita::where('dia',$dia)->count();
           $turno=1+$pacientes;
           return ["turno"=>$turno,"hora"=>$hora, 'dia'=>$dia];
        }
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
