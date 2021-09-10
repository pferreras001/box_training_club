@extends('layout')

@section('section')

<section class="section section__anadir_colab">
  <div class="dar_alta__container container">
    
    <script src="{{ asset('/js/comprobarlink.js')}}"></script>
    
    <form action="{{route('insertar_colab')}}" method="POST" enctype="multipart/form-data" onsubmit="return comprobarlink()">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre de la empresa" required/><br><br>
        <input type="text" name="link_web" id="link_web" placeholder="Link de la web"/>
        <br><br>
        <textarea name="descripcion" required="true" placeholder="Descripción..."></textarea><br><br>
        <b>Selecciona una imagen</b><input type="file" name="imagen" required accept="image/*"/><br><br>
        <input class="btn btn__añadir_colab" type="submit" value="Crear colaborador"/>
        <br><br>
    </form>
  </div>
</section>

@endsection