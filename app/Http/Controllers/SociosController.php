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
        $trofeos= Skill::where('user_mail',"=",session('email'))->orderBy('skill_name')->get();
        $nivel=0;
        foreach($trofeos as $trofeo){
            $trophys=explode(',', $trofeo->trofeos);
            foreach($trophys as $trophy){
                $trophy=explode('/',$trophy)[0];
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
        //para conseguir el ranking basta con hacer un for y comparar sus puntos con los de otro para ver en que posicion esta empezando por 1 y de ahi sumando.
        $usuarios = User::all();
            $rango=1;
            foreach($usuarios as $usuario){
                if($usuario->email!=$user->email){
                    $trofeos_temp= Skill::where('user_mail',"=",$usuario->email)->get();
                    $nivel_temp=0;
                    foreach($trofeos_temp as $trofeo){
                        $trophys=explode(',', $trofeo->trofeos);
                        foreach($trophys as $trophy){
                            $trophy=explode('/',$trophy)[0];
                            $nivel_temp=$nivel_temp+$trophy;
                        }
                    }
                    $puntos_temp=intval($nivel_temp*3);
                    $nivel_temp=intval($nivel_temp*1.2);
                    $fecha_entrada=$usuario->enter_date;
                    $date = new DateTime($fecha_entrada);
                    $now = new DateTime();
                    $interval = $date->diff($now);
                    $dias_temp=$interval->format('%a');
                    if($puntos_temp>$puntos){
                        $rango=$rango+1;
                    }
                    if($puntos_temp==$puntos and $dias_temp>$dias){
                        $rango=$rango+1;
                    }
                }  
            }
        return view('perfil',compact('user','trofeos','nivel','puntos','dias','rango'));
    }
    else{
        return redirect('/');
    }
  }
    public function ranking(){//vista de perfil desde punto de vista del usuario
    if(session('tipo')=='user'){
        $rankingUsers = [];
        $users = User::where('email',"!=",'admin@boxtrainingclub.com')->get();
        foreach ($users as $user){
            $trofeos= Skill::where('user_mail',"=",$user->email)->get();
            $nivel=0;
            foreach($trofeos as $trofeo){
                $trophys=explode(',', $trofeo->trofeos);
                foreach($trophys as $trophy){
                    $trophy=explode('/',$trophy)[0];
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
            $tupla=[$puntos,$user,$dias];
            array_push($rankingUsers,$tupla);
            //$dias=$interval->format('%S');
            //para conseguir el ranking basta con hacer un for y comparar sus puntos con los de otro para ver en que posicion esta empezando por 1 y de ahi sumando.
            /*$usuarios = User::where('email',"!=",'admin@boxtrainingclub.com')->where('email',"!=",$user->email)->get();
                $rango=1;
                foreach($usuarios as $usuario){
                    if($usuario->email!=$user->email){
                        $trofeos_temp= Skill::where('user_mail',"=",$usuario->email)->get();
                        $nivel_temp=0;
                        foreach($trofeos_temp as $trofeo){
                            $trophys=explode(',', $trofeo->trofeos);
                            foreach($trophys as $trophy){
                                $trophy=explode('/',$trophy)[0];
                                $nivel_temp=$nivel_temp+$trophy;
                            }
                        }
                        $puntos_temp=intval($nivel_temp*3);
                        $nivel_temp=intval($nivel_temp*1.2);
                        $fecha_entrada=$usuario->enter_date;
                        $date = new DateTime($fecha_entrada);
                        $interval = $date->diff($now);
                        $dias_temp=$now->getTimestamp() - $date->getTimestamp();
                        if($puntos_temp>$puntos){
                            $rango=$rango+1;
                        }
                        else if($puntos_temp===$puntos and $dias_temp>$dias){
                            $rango=$rango+1;
                        }
                    }  
                }
            //dd($rango);
            //dd($rango,$user->email,$puntos);
            if($rango<=20){
                $rankingUsers[$rango-1]=$user;
                $fecha_entrada=$user->enter_date;
                $date = new DateTime($fecha_entrada);
                $now = new DateTime();
                $interval = $date->diff($now);
                $dias=$interval->format('%a');
                $arrayPuntos[$rango-1]=$puntos;
                $arrayDias[$rango-1]=$dias;
            }*/
        }
        usort($rankingUsers, function($a, $b)
              {
                if ($a[0] == $b[0]) {
                    if ($a[2] == $b[2]) {
                        return 0;
                    }
                    else if($a[2] > $b[2]){
                        return -1;
                    }
                    return 1;
                }   
                else if($a[0] > $b[0]){
                        return -1;
                }
                  return 1;
              });
        //array_reverse($rankingUsers,true);
        //dd($rankingUsers[2][1]->name);
        return view('ranking',compact('rankingUsers'));
    }
    else{
        return redirect('/');
    }
  }
    public function cmp($a, $b) {
        if ($a[0] == $b[0]) {
        return 0;
        }   
        return ($a < $b) ? -1 : 1; 
    }
    function modificar_perfil($id){
        if(session('tipo')=='user'){
            $user=User::find($id);
            return view('modificar_perfil',compact('user'));
        }
        else{
            return redirect('/');
        }
    }
    
     public function fightwood(){
        if(session('tipo')=='user'){
            return view('fightwood');
        }
        else if(session('tipo')=='admin'){
            $admin='';
            return view('fightwood',compact('admin'));
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
                //ON SERVER
                //$req->image->move("/hosting/www/boxtrainingclub.com/public/images/socios", $imagename);
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
    
    
    public function normativa(){
      return view('normativa');
    }
    
    public function reservas(){
      return view('reservas');
    }
    
    
}
