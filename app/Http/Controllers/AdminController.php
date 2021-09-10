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
use Illuminate\Support\Facades\File; 

class AdminController extends Controller
{
    public function dar_alta(){
        if(session('tipo')=='admin'){
            return view('dar_alta');
        }
        else{
            return redirect('/');
        }
    }
    
    public function users(){
    if(session('tipo')=='admin'){
        $users = User::paginate();
        return view('users',compact('users'));
    }
    else{
        return redirect('/');
    }
    

  }
    public function search_user(Request $req){
    if(session('tipo')=='admin'){
        $users = User::all();
        if($req->input('findedUser')!=''){
            $user_array=[];
            foreach($users as $user){
                $name=$user->name.$user->surname;
                if(str_contains($name,$req->input('findedUser'))){
                    array_push($user_array,$user);
                }
            }
            $users = $user_array;
        }
        $resultado=count($users);
        return view('users',compact('users','resultado'));
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
    public function aumentarcopa($id){
     if(session('tipo')=='admin'){
         $num=strval(explode(' ',$id)[0]);
         $email=strval(explode(' ',$id)[1]);
         $nombre=strval(explode(' ',$id)[2]);
         $user = User::where('email',"=",$email)->first();
         $trofeos= Skill::where('skill_name',"=",$nombre)->where('user_mail',"=",$email)->first();
         $trophys=explode(',', $trofeos->trofeos); 
         $trophy=$trophys[$num];
         if($trophy!=3){
             if($num==0){
                $trophys[$num]=3;
             }
             else{
                 $trophys[$num]=$trophy+1;
             }
            $trophys2=implode(',',$trophys);
            $trofeos->trofeos=$trophys2;
            $trofeos->save(); 
         }
         $trofeos= Skill::where('user_mail',"=",$email)->get();
         return redirect('/admin_perfil/'.$email);
         
     }
        else{
            return redirect('/');
        }

  }
    public function disminuircopa($id){
     if(session('tipo')=='admin'){
         $num=strval(explode(' ',$id)[0]);
         $email=strval(explode(' ',$id)[1]);
         $nombre=strval(explode(' ',$id)[2]);       
         $user = User::where('email',"=",$email)->first();
         $trofeos= Skill::where('skill_name',"=",$nombre)->where('user_mail',"=",$email)->first();
         $trophys=explode(',', $trofeos->trofeos);
         $trophy=$trophys[$num];
         if($trophy!=0){
             if($num==0){
                $trophys[$num]=0;
             }
             else{
                 $trophys[$num]=$trophy-1;
             }
            $trophys2=implode(',',$trophys);
            $trofeos->trofeos=$trophys2;
            $trofeos->save(); 
         }
         $trofeos= Skill::where('user_mail',"=",$email)->get();
         return redirect('/admin_perfil/'.$email);
         
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
    public function admin_perfil($id){
        if(session('tipo')=='admin'){
             $user = User::where('email',"=",$id)->first();
             $trofeos= Skill::where('user_mail',"=",$id)->get();
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
            
            $usuarios = User::all();
            $rango=1;
            foreach($usuarios as $usuario){
                if($usuario->email!=$user->email){
                    $trofeos_temp= Skill::where('user_mail',"=",$usuario->email)->get();
                    $nivel_temp=0;
                    foreach($trofeos_temp as $trofeo){
                        $trophys=explode(',', $trofeo->trofeos);
                        foreach($trophys as $trophy){
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
                    if($puntos_temp=$puntos and $dias_temp>$dias){
                        $rango=$rango+1;
                    }
                }  
            }
            return view('admin_perfil',compact('user','trofeos','nivel','dias','puntos','rango'));
        }
        else{
            return redirect('/');
        }
    }
    
    public function gestionar_colaboradores(){
        if(session('tipo')=='admin'){
            $colaboradores=Colaboradore::all();
            return view('colaboradores_admin',compact('colaboradores'));
        }
        else{
            return redirect('/');
        }
    }
    public function anadir_colab(){
        if(session('tipo')=='admin'){
            $colaboradores=Colaboradore::all();
            return view('anadir_colab',compact('colaboradores'));
        }
        else{
            return redirect('/');
        }
    }
    public function insertar_colab(Request $req){
      $req->validate([
          'nombre'=>'required',
          'imagen'=>'required',
          'descripcion'=>'required',
      ]);
      $imagename= uniqid().'-'. $req->input('nombre').'.'.$req->imagen->extension();
      //ON SERVER
      //$req->image->move("/hosting/www/boxtrainingclub.com/public/images/colaboradores_socios", $imagename); 
      $req->imagen->move(public_path('images/colaboradores_socios'),$imagename);
        if(empty($req->input('link_web'))){
            $link='';
        }
        else{
            $link='https://'.$req->input('link_web');
        }
      Colaboradore::create([
          'nombre'=>$req->input('nombre'),
          'descripcion'=>$req->input('descripcion'),
          'imagen'=>$imagename,
          'link_web'=>$link,
      ]);
      return redirect('gestionar_colaboradores');
  }
    public function editar_colab($id){
        if(session('tipo')=='admin'){
            $colaborador=Colaboradore::find($id);
            return view('editar_colab',compact('colaborador'));
        }
        else{
            return redirect('/');
        }
    }
    public function update_colab(Request $req){
        if(empty($req->input('link_web'))){
            $link='';
        }
        else{
            $link='https://'.$req->input('link_web');
        }
        $data=Colaboradore::find($req->id);
        $nombre=$data->nombre;
        if(!empty($req->nombre)){
            $data->nombre=$req->nombre;
            $nombre=$req->nombre;
        }
        if(!empty($req->nombre)){
            $data->link_web=$link;
        }
        if(!empty($req->imagen)){
            File::delete('images/colaboradores_socios'.$data->imagen);
            $imagename= uniqid().'-'.$nombre.'.'.$req->imagen->extension();
            $req->imagen->move(public_path('images/colaboradores_socios'),$imagename);
            $data->imagen=$imagename;
        }
        $data->save();
        return redirect('gestionar_colaboradores');
    }
    public function eliminar_colab($id){
        $data = Colaboradore::find($id);   
        $data->delete();
        return redirect('gestionar_colaboradores');
  }
    
}
