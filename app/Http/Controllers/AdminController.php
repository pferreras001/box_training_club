<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\gestionSociosMailable;
use App\Mail\recoveryMailable;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function users(){
    if(session('tipo')=='admin'){
        $users = User::paginate();
        return view('users',compact('users'));
    }
    else{
        return redirect('/');
    }
    

  }

    public function modificar($id){
    if(session('tipo')=='admin'){
        $user = User::find($id);   
        return view('modificar',compact('user'));
    }
    else{
        return redirect('/');
    }

  }
    
    public function update(Request $req){
        if(session('tipo')=='admin'){
            $data=User::find($req->id);
            $data->name=$req->name;
            $data->email=$req->email;
            $data->surname=$req->surname;
            $data->save();
            return redirect('users');
        }
        else{
            return redirect('/');
        }
    }
    
     public function delete($id){
     if(session('tipo')=='admin'){
        $data = User::find($id);   
        $data->delete();
        return redirect('users');
     }
        else{
            return redirect('/');
        }

  }
    public function send_signup_mail($id){
        if(session('tipo')=='admin'){
            $user=User::find($id);
            $correo= new gestionSociosMailable($user->confirmation_code);
            Mail::to($user->email)->send($correo);
            return view('confirmacion_enviada');
        }
        else{
            return redirect('/');
        }
    }
}
