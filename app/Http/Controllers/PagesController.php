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
    
    
    
    
    
  //control del blog ->TO DO: METERLO EN UN CONTROLADOR NUEVO
  public function blog(){  
    $blogentrys = Blogentry::paginate(3);
    $etiquetas = EtiquetasBlog::all();
    return view('blog',compact('blogentrys','etiquetas'));
  }
  public function blog_search(Request $req){
    $data=$req->etiquetas;
      if($data!='ninguna'){
          $blogentrys = Blogentry::where('etiquetas','like','%'.$data.'%')->paginate(3);
      }
      else{
          $blogentrys = Blogentry::paginate(3);
      }
    $etiquetas = EtiquetasBlog::all();
    return view('blog',compact('blogentrys','etiquetas'));
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
      $imagename= uniqid().'-'. $req->titulo.'.'.$req->image->extension();
      $req->image->move(public_path('images'),$imagename);
      Blogentry::create([
          'titulo'=>$req->input('titulo'),
          'descripcion'=>$req->input('descripcion'),
          'image'=>$imagename,
          'texto'=>$req->input('texto'),
          'autor'=>$req->input('autor'),
          'etiquetas'=>$req->input('etiquetas'),
      ]);
      $etiquetacoll=$req->input('etiquetas');
      foreach(explode(',',$etiquetacoll) as $etiqueta){
          $test=null;
          $test=EtiquetasBlog::find($etiqueta);
            if($test==null){
                EtiquetasBlog::create([
                    'etiqueta'=>$etiqueta,
                ]);
            }
           
      }
         
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
    
    
    
    //control de sesion
    public function dar_alta(){
    return view('dar_alta');

    }
    public function send_register(Request $req){//TODO->CHEKEAR QUE SEA UN USUARIO NUEVO
        $req->validate([
          'email'=>'required',
          'nombre'=>'required',
          'apellidos'=>'required',
          'birth_date'=>'required',
      ]);
      $confirmation=hash("sha256", random_int(10000,99999),false);
      $recovery=hash("sha256", random_int(10000,99999),false); 
      User::create([
          'email'=>$req->input('email'),
          'name'=>$req->input('nombre'),
          'surname'=>$req->input('apellidos'),
          'birth_date'=>$req->input('birth_date'),
          'confirmed'=>0,
          'confirmation_code'=>$confirmation,
          'recovery_code'=>$recovery,
      ]);
        $correo= new gestionSociosMailable($confirmation);
        Mail::to($req->input('email'))->send($correo);
        return redirect('confirmacion_enviada');
    }
    
    public function signup($code){
        $user=User::where('confirmation_code',"=",$code)->first();
        if($user!=null){
            return view('signup',compact('user'));
        }
        else{
            return view('inicio');
        }
    }
    
     public function signup_update(Request $req){//->TODO:CHECKEAR EN QUE METODO HAY Q HASHEAR
        $data=User::find($req->id);
        $pass=hash("sha256",$req->input('password'),false);
        $data->password=$pass;
        $data->save();
        return redirect('login');
    }
    
    public function session_start(Request $req){
        
         $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $email=$req->input('email');
        $password=$req->input('password');
        $remember=true;
        
        if (Auth::attempt(['email' => $email, 'password' => $password, 'confirmed' => 1], $remember)) {
            $req->session()->regenerate();
            return redirect()->intended('inicio');
        }
        else{
            return view('login',compact('email'));
        }
        
    }
}
