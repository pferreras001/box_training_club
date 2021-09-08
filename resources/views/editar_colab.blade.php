@extends('layout')

@section('section')

<section class="section section__edit_colab">
  <div class="dar_alta__container container">
    <script src="{{ asset('/js/comprobarlink.js')}}"></script>
    <form action="{{route('update_colab')}}" enctype="multipart/form-data" method="POST" onsubmit="return comprobarlink()">
        @csrf
        <input type="hidden" name="id" value="{{$colaborador->id}}"/>
        Nombre: <input type="text" name="nombre" placeholder="{{$colaborador->nombre}}"/><br><br>
        Link: <input type="text" name="link_web" id="link_web" placeholder="{{$colaborador->link_web}}"/><br><br>
        <b class="text-white">Selecciona una nueva imagen en caso de desear modificarla</b><input type="file" name="imagen" accept="image/*"/><br><br>
        <input class="btn btn__dar_alta" type="submit" value="Modificar"/> 
    </form>
  </div>
</section>


@endsection