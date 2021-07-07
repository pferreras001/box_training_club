@extends('layout')

@section('section')

<section class="section section__anadir_colab">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

   <h1 class="text-6xl text-white"> Crear post</h1>
    
    
    @if($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2x py-4">
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{route('insertar_colab')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nombre" placeholder="Nombre de la empresa" required class="bg-t block border-b-2 w-full h-20 text-6xl outline-none"/><br><br>
        <br><br>
        <input type="text" name="link" placeholder="link de la web"/>
        <br><br>
        <b class="text-white">Selecciona una imagen</b><input type="file" name="imagen" required accept="image/*"/><br><br>
        <input type="submit" value="crear colaborador"/>
        <br><br>
    </form>


@endsection