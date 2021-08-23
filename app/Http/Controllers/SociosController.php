<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Skill;
use App\Models\Colaboradore;
use Illuminate\Support\Facades\Auth;
use App\Mail\gestionSociosMailable;
use App\Mail\recoveryMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 
session_start();

class SociosController extends Controller
{
    public function perfil(){//vista de perfil desde punto de vista del usuario
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
        $puntos=intval($nivel*3);
        $nivel=intval($nivel*1.2);
        $fecha_entrada=$user->enter_date;
        $date = new DateTime($fecha_entrada);
        $now = new DateTime();
        $interval = $date->diff($now);
        $dias=$interval->format('%a');
        
        return view('perfil',compact('user','trofeos','nivel','puntos','dias'));
    }
    else{
        return redirect('/');
    }
  }
    public function modificar_perfil($id){
        if(session('tipo')=='user'){
            $user=User::find($id);
            return view('modificar_perfil',compact('user'));
        }
        else{
            return redirect('/');
        }
    }
    public function update_perfil(Request $req){
        if(session('tipo')=='user'){
            $data=User::find($req->id);
            $data->lema=$req->lema;
            $data->apodo=$req->apodo;
            if(!empty($req->image)){
                if($data->image!='predeterminado.png'){
                    File::delete('images/socios'.$data->image);
                }
                $imagename= uniqid().'-'.$req->name.'.'.$req->image->extension();
                $req->image->move(public_path('images/socios'),$imagename);
                $data->image=$imagename;
            }
            $data->save();
            return redirect('perfil');
        }
        else{
            return redirect('/');
        }
    }
    
    
    public function colaboradores(){//vista de perfil desde punto de vista del usuario
    if(session('tipo')=='user'){
        $colaboradores=Colaboradore::all();
        return view('colaboradores',compact('colaboradores'));
    }
    else{
        return redirect('/');
    }
  }
    
    
}
