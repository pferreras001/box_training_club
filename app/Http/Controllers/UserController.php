<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\gestionSociosMailable;
use App\Mail\recoveryMailable;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
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
      $user=User::where('email',"=",$req->input('email'))->first();
      if($user!=null){
          return view('dar_alta',compact('user'));
      }
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
        return view('confirmacion_enviada');
    }   
    public function signup_form($id){
        $user=User::where('confirmation_code',"=",$id)->first();
        if($user!=null && $user->confirmed!=1){
            return view('signup_form',compact('user'));
        }
        else{
            return view('404');
        }
    }
    
     public function signup_update(Request $req){//->TODO:CHECKEAR EN QUE METODO HAY Q HASHEAR
         $user=User::find($req->id);
        if($user != null && $user->confirmed!=1){
            $pass=hash("sha256",$req->input('password'),false);
            $user->password=$pass;
            $user->confirmed='1';
            $user->save();
            $email=$user->email;
            return view('login',compact('email'));
        }
        else{
            return view('404');
        }
    }
    
    public function session_start(Request $req){
        
         $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        $email=$req->input('email');
        $email=strip_tags($email);
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
    public function password_recovery(){
        return view('recover_password');
    }
    public function send_recover(Request $req){
        $user=User::where('email',"=",$req->input('email'))->first();
        if($user != null){
            $correo= new recoveryMailable($user->recovery_code);
            Mail::to($req->input('email'))->send($correo);
            $hecho="";
            return view('recover_password',compact('hecho'));  
        }
        else{
            $fail="";
            return view('recover_password',compact('fail'));
        }
    }
    public function recover_form($id){
    $user = User::where('recovery_code',"=",$id)->first();
        if($user!=null){
           return view('recover_form',compact('user')); 
        }
        else{
            return view('404');
        }
        
    }
    
    public function update_pass(Request $req){
        $user=User::find($req->id);
        if($user != null){
            $pass=hash("sha256",$req->input('password'),false);
            $recovery=hash("sha256", random_int(10000,99999),false);
            $user->recovery_code=$recovery;
            $user->password=$pass;
            $user->save();
            $email=$user->email;
            return view('login',compact('email'));  
        }
        else{
            return view('404');
        }    
    }
    
}
