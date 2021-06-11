<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
  
  public function blog(){

    return view('blog');

  }
  
  public function galeria(){

    return view('galeria');

  }

  public function tienda(){

    return view('tienda');

  }

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
