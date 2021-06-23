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
    public function send_signup_mail($id){
        $user=User::find($id);
        $correo= new gestionSociosMailable($user->confirmation_code);
        Mail::to($user->email)->send($correo);
        return view('confirmacion_enviada');
    }
}
