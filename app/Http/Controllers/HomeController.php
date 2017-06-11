<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use App\Persona;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'prueba']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function prueba(Request $request)
    {

        $persona = \App\Persona::all()->lists('nombre','id')->toArray();
        $rol = \App\Rol::all()->lists('nombre','id')->toArray();


        $a = [
            2=>'dos',
            4 => 'cuatro',

        ];

        $b = [
            5 => 'cinco',
            10 => 'diez'
        ];
        $datos= $persona+$rol;
dd($datos);
        foreach ($persona as $key => $value){
            $datos[]= [$key => $value];
        }

        return view('prueba',compact('persona','rol'));

    }



    public function dashboard()
    {
        return view('layouts.dashboard');
    }
}
