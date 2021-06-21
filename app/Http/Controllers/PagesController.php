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

    return view('inicio');

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
    $email = "";
    return view('login',compact('email'));

  }
}
