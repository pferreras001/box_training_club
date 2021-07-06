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

class SociosController extends Controller
{
    public function perfil(){//vista de perfil desde punto de vista del usuario->TODO:hacer otra funcion para acceder desde admin para gestionar
    if(session('tipo')=='user'){
        $user = User::where('email',"=",session('email'))->first();
        $trofeos= Skill::where('user_mail',"=",session('email'))->get();
        $nivel=0;
        foreach($trofeos as $trofeo){
            $trophys=explode(',', $trofeo->trofeos);
            foreach($trophys as $trophy){
                $nivel=$nivel+$trophy;
            }
        }
        $nivel=intval($nivel*1.2);
        
        return view('perfil',compact('user','trofeos','nivel'));
    }
    else{
        return redirect('/');
    }
    

  }
}
