@extends('layout')

@section('section')

<section class="section section__edit_colab">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="{{ asset('/js/comprobarlink.js')}}"></script>
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl text-yellow-200">Modificar colaborador</h1>
            <h2>Rellena los campos que quieras modificar unicamente.</h2>
        </div>
    </div>
    <div>
        <form action="{{route('update_colab')}}" enctype="multipart/form-data" method="POST" onsubmit="return comprobarlink()">
            @csrf
            <input type="hidden" name="id" value="{{$colaborador->id}}"/>
            nombre <input type="text" name="nombre" placeholder="{{$colaborador->nombre}}"/><br><br>
            link <input type="text" name="link_web" id="link_web" placeholder="{{$colaborador->link_web}}"/><br><br>
            <b class="text-white">Selecciona una nueva imagen en caso de desear modificarla</b><input type="file" name="imagen" accept="image/*"/><br><br>
            <input type="submit" value="modificar"/> 
        </form>
    </div>
</section>


@endsection