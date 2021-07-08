@extends('layout')

@section('section')

<section class="section section__anadir_colab">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="{{ asset('/js/comprobarlink.js')}}"></script>
   <h1 class="text-6xl text-white"> Crear post</h1>
    
    <form action="{{route('insertar_colab')}}" method="POST" enctype="multipart/form-data" onsubmit="return comprobarlink()">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre de la empresa" required class="bg-t block border-b-2 w-full h-20 text-6xl outline-none"/><br><br>
        <br><br>
        <input type="text" name="link_web" id="link_web" placeholder="link de la web"/>
        <br><br>
        <b class="text-white">Selecciona una imagen</b><input type="file" name="imagen" required accept="image/*"/><br><br>
        <input type="submit" value="crear colaborador"/>
        <br><br>
    </form>


@endsection