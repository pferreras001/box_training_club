<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blogentry;

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

    return view('login');

  }
    
    
    
    
    
  //control del blog ->TO DO: METERLO EN UN CONTROLADOR NUEVO
  public function blog(){  
    $blogentrys = Blogentry::paginate(3);
    return view('blog',compact('blogentrys'));
  }
  public function create_entry(){
      return view('create_entry');
  }
  public function insert_entry(Request $req){
      $req->validate([
          'titulo'=>'required',
          'descripcion'=>'required',
          'image'=>'required',
          'texto'=>'required',
          'autor'=>'required',
      ]);
      Blogentry::create([
          'titulo'=>$req->input('titulo'),
          'descripcion'=>$req->input('descripcion'),
          'image'=>$req->input('image'),
          'texto'=>$req->input('texto'),
          'autor'=>$req->input('autor'),
          'etiquetas'=>$req->input('etiquetas'),
      ]);
      return redirect('blog');
  }
  public function show_entry($id){
    $entry = Blogentry::find($id);   
    return view('show_entry',compact('entry'));
  }
  public function edit_entry($id){
    $entry = Blogentry::find($id);   
   return view('edit_entry',compact('entry'));
  }
    public function update_entry(Request $req){
        $data=Blogentry::find($req->id);
        $data->titulo=$req->titulo;
        $data->descripcion=$req->descripcion;
        $data->texto=$req->texto;
        $data->autor=$req->autor;
        $data->etiquetas=$req->etiquetas;
        $data->save();
        return redirect('blog');
    }
    public function delete_entry($id){
        $data = Blogentry::find($id);   
        $data->delete();
        return redirect('blog');

  }
    
 
 
    
    //CONTROL DE ADMIN ->TO DO: METERLO EN UN CONTROLADOR NUEVOC
  
  public function users(){
    $users = User::paginate();
    return view('users',compact('users'));

  }

    public function modificar($id){
    $user = User::find($id);   
    return view('modificar',compact('user'));

  }
    public function update(Request $req){
        $data=User::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->surname=$req->surname;
        $data->save();
        return redirect('users');
    }
     public function delete($id){
        $data = User::find($id);   
        $data->delete();
        return redirect('users');

  }
}
