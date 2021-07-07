<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogentry;
use App\Models\EtiquetasBlog;
use Illuminate\Support\Facades\Auth;
use App\Mail\gestionSociosMailable;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
  public function inicio(){
    $blogentrys = Blogentry::orderByDesc('fecha')->get();
    $blog_array=[];
    $num=0;
    foreach($blogentrys as $blogentry){
        if($num < 5){
            $num=$num+1;
            array_push($blog_array,$blogentry);
        }
    }
    $blogentrys=$blog_array;
    return view('inicio',compact('blogentrys'));

  }
  
  public function horarios(){

    return view('horarios');

  }
  
  public function actividades(){

    return view('actividades');

  }
  
  public function cuotas(){

    return view('cuotas');

  }
  
  public function contacto(){

    return view('contacto');

  }
    
 public function galeria(){

    return view('galeria');

  }

  public function tienda(){

    return view('tienda');

  }

  public function login(){
   if(session('tipo')==null){   
    $email = "";
    return view('login',compact('email'));
   }
   else{
       return redirect('/');
   }
    
  }
}
