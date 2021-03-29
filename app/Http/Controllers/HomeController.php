<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
}
