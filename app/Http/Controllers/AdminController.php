<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;

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
        return $request;
    }
    

   
}
