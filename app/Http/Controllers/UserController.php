<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use App\Mail\gestionSociosMailable;
use App\Mail\recoveryMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
session_start();

class UserController extends Controller
{
    //control de sesion
    public function send_register(Request $req){//TODO->CHEKEAR QUE SEA UN USUARIO NUEVO
        $req->validate([
          'email'=>'required',
          'nombre'=>'required',
          'apellidos'=>'required',
          'birth_date'=>'required',
      ]);
      $confirmation=Hash::make(random_int(10000,99999));
      $recovery=Hash::make(random_int(10000,99999));
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
          'confirmation_code'=>preg_replace('/[^A-Za-z0-9\-]/', '', $confirmation),
          'recovery_code'=>preg_replace('/[^A-Za-z0-9\-]/', '', $recovery),
      ]);
        $email=$req->input('email');
        Skill::create([
            'user_mail'=>$email,
            'skill_name'=>'Boxing',
            'trofeos'=>'0/Iniciación,0/Desplazamientos,0/Jab,0/Cross,0/Head Hook,0/Body Hook,0/Uppercut,0/Combos,0/Cambios Guardia,0/Paradas'
        ]);
        Skill::create([
            'user_mail'=>$email,
            'skill_name'=>'Thai Boxing',
            'trofeos'=>'0/Codos,0/Rodillas,0/Puño-Codo Salto'
        ]);
        Skill::create([
            'user_mail'=>$email,
            'skill_name'=>'Taekwondo',
            'trofeos'=>'0/Frontal,0/Circular,0/Cöz,0/Tornado,0/Combos,0/Cambios Guardia'
        ]);
        Skill::create([
            'user_mail'=>$email,
            'skill_name'=>'Jump Rope',
            'trofeos'=>'0/Básico,0/Medio,0/Avanzado'
        ]);
        Skill::create([
            'user_mail'=>$email,
            'skill_name'=>'Speed Bag',
            'trofeos'=>'0/Básico,0/Medio,0/Avanzado'
        ]);
        Skill::create([
            'user_mail'=>$email,
            'skill_name'=>'Punch Mitts',
            'trofeos'=>'0/Básico'
        ]);
        Skill::create([
            'user_mail'=>$email,
            'skill_name'=>'Kicking Pads',
            'trofeos'=>'0/Básico'
        ]);
        Skill::create([
            'user_mail'=>$email,
            'skill_name'=>'Rope Climb',
            'trofeos'=>'0/Básico'
        ]);
        $correo= new gestionSociosMailable(preg_replace('/[^A-Za-z0-9\-]/', '', $confirmation));
        Mail::to($req->input('email'))->send($correo);
        return view('confirmacion_enviada');
    }
    
    public function signup_form($id){
        $user=User::where('confirmation_code',"=",$id)->first();
        if($user!=null && $user->confirmed!=1){
            return view('signup_form',compact('user'));
        }
        else{
            abort(404);
        }
    }
    
     public function signup_update(Request $req){
         $user=User::find($req->id);
        if($user != null && $user->confirmed!=1){
            $pass=Hash::make($req->input('password'));
            $user->password=$pass;
            $user->confirmed='1';
            $user->save();
            $email=$user->email;
            return view('login',compact('email'));
        }
        else{
            abort(404);
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
            session(['email' => $email]);
            if($email=='admin@boxtrainingclub.com'){
                session(['tipo' => 'admin']);
            }
            else{
                session(['tipo' => 'user']);
            }
            return redirect()->intended('/');
        }
        else{
            $fail='true';
            return view('login',compact('email','fail'));
        }
        
    }
    
    public function logout(Request $req)
    { 
            Auth::logout();

            $req->session()->invalidate();

            $req->session()->regenerateToken();
            session(['email' => '']);
            session(['tipo' => '']);
            session_destroy();
            return redirect('/');
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
            abort(404);
        }
        
    }
    
    public function update_pass(Request $req){
        $user=User::find($req->id);
        if($user != null){
            $pass=Hash::make($req->input('password'));
            $recovery=Hash::make(random_int(10000,99999));
            $user->recovery_code=preg_replace('/[^A-Za-z0-9\-]/', '', $recovery);
            $user->password=$pass;
            $user->save();
            $email=$user->email;
            return view('login',compact('email'));  
        }
        else{
            abort(404);
        }    
    }
    
    
    
}
