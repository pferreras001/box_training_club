<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogentry;
use App\Models\EtiquetasBlog;
use Illuminate\Support\Facades\Auth;
use App\Mail\gestionSociosMailable;
use App\Mail\contactoMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
    public function contacto_asunto($id){
    $asunto=strval($id);
    //dd($asunto);
    return view('contacto',compact('asunto'));

  }
    
  public function enviar_contacto(Request $req){
    $correo= new contactoMailable($req->input('email'),$req->input('asunto'),$req->input('mensaje'));
    Mail::to('endikasier@gmail.com')->send($correo);//sustituir esto por el correo del cliente.
    return view('contacto_enviado');
  }
    
 public function galeria(){

    $directory = base_path().'/public/img/galeria/big';
    $files = glob($directory."*.jpg");

    return view('galeria',compact('files'));

  }

  public function tienda(){

    return view('tienda');

  }

  public function login(){
   if(session('tipo')==null){   
    return view('login');
   }
   else{
       return redirect('/');
   }
}

  public function avisoLegal(){
   return view('aviso_legal');
    
  }
}
