<?php

namespace App\Http\Controllers;

use App\Personal;
use App\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::select('id','nombre')->get();
        return view("auth.register",compact('tipos'));
       
    }

    
    public function register(Request $request)
    {   //$data = ($request);
        //return dd($request->toArray());
        $v = Validator::make($request->all(), [
            'dni' =>'required|unique:personals',
            'email' =>'required|unique:personals',
            
        ]);

        if ($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }  
                
        Personal::create($request->toArray());
        
        return redirect()->route('index')->with('message', '¡ Registro con éxito !');
        
    }

}
