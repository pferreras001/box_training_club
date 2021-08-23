@extends('layout')

@section('section')

<section class="section section__modificar_perfil">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <h1> Editar Perfil</h1>
    <div>
        <form action="{{route('update_perfil')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}"/>
            apodo <input type="text" name="apodo" value="{{$user->apodo}}"/><br><br>
            lema <input type="text" name="lema" value="{{$user->lema}}"/><br><br>
            <b class="text-white">Selecciona una nueva imagen en caso de desear modificarla</b><input type="file" name="image" accept="image/*"/><br><br>
            <input type="submit" value="modificar"/> 
        </form>

    </div>
</section>


@endsection