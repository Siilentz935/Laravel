<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function indexAction(){
        return view('home');
    }
    public function arregloAction(){
        return view('home',[
            'name' => 'Osman'
        ]);
    }
    public function conAction(){
        return view('home')->with('name','Jesus');
    }
    public function parametroAction($name,$apellido1='casas',$apellido2='de Brayan'){
        return view('home')->with('name',$name)->with('apellido1',$apellido1)->with('apellido2',$apellido2);
    }
}
