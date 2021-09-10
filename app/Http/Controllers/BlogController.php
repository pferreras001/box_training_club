<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogentry;
use App\Models\EtiquetasBlog;
use Illuminate\Support\Facades\Auth;
use App\Mail\gestionSociosMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File; 

class BlogController extends Controller
{
    //control del blog ->TO DO: METERLO EN UN CONTROLADOR NUEVO
  public function blog(){  
    $blogentrys = Blogentry::paginate(6);
    $etiquetas = EtiquetasBlog::all();
    return view('blog',compact('blogentrys','etiquetas'));
  }
    
  public function blog_search(Request $req){
    $data=$req->etiquetas;
      if($data!='Todas'){
          $blogentrys = Blogentry::where('etiquetas','like','%'.$data.'%')->paginate(6);
      }
      else{
          $blogentrys = Blogentry::paginate(6);
      }
    $etiquetas = EtiquetasBlog::all();
    return view('blog',compact('blogentrys','etiquetas','data'));
  }
    
  public function create_entry(){
      return view('create_entry');
  }
    
  public function insert_entry(Request $req){
      $req->validate([
          'titulo'=>'required',
          'image'=>'required',
          'texto'=>'required',
      ]);
      $imagename= uniqid().'-'. $req->titulo.'.'.$req->image->extension();
      //ON SERVER
      //$req->image->move("/hosting/www/boxtrainingclub.com/public/images/blog", $imagename); 
      $req->image->move(public_path('images/blog'),$imagename);
      Blogentry::create([
          'titulo'=>$req->input('titulo'),
          'image'=>$imagename,
          'texto'=>$req->input('texto'),
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
        $data->texto=$req->texto;
        $data->autor=$req->autor;
        $data->etiquetas=$req->etiquetas;
        if(!empty($req->imagen)){
            File::delete('images/blog'.$data->image);
            $imagename= uniqid().'-'.$req->titulo.'.'.$req->imagen->extension();
            $req->imagen->move(public_path('images/blog'),$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return redirect('blog');
    }
    
    public function delete_entry($id){
        $data = Blogentry::find($id);   
        $data->delete();
        return redirect('blog');
  }
}
