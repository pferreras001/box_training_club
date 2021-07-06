<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogentry;
use App\Models\EtiquetasBlog;
use Illuminate\Support\Facades\Auth;
use App\Mail\gestionSociosMailable;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
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
          'image'=>'required',
          'texto'=>'required',
          'autor'=>'required',
      ]);
      $imagename= uniqid().'-'. $req->titulo.'.'.$req->image->extension();
      $req->image->move(public_path('images'),$imagename);
      Blogentry::create([
          'titulo'=>$req->input('titulo'),
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
}
