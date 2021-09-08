@extends('layout')

@section('section')

<section class="section section__modificar_perfil">
  <div class="dar_alta__container container">
    <form action="{{route('update_perfil')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}"/>
        Apodo: <input type="text" name="apodo" value="{{$user->apodo}}"/><br><br>
        Lema: <input type="text" name="lema" value="{{$user->lema}}"/><br><br>
        <b class="text-white">Selecciona una nueva imagen en caso de desear modificarla</b><input type="file" name="image" accept="image/*"/><br><br>
        <input class="btn" type="submit" value="Modificar"/> 
    </form>
  </div>
</section>


@endsection