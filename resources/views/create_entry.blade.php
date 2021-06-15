@extends('layout')

@section('section')

<section class="section section__create_entry">
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
    
    <form action="{{route('insert_entry')}}" method="POST">
        @csrf
        <input type="text" name="autor" value="anonimo" required/>
        <input type="text" name="titulo" placeholder="Titulo..." required class="bg-t block border-b-2 w-full h-20 text-6xl outline-none"/><br><br>
        <textarea name="descripcion" placeholder="Descripcion..." required class="py-20 bg-gray-0 block border-b-2 w-full h-60 text-xl outline-none"></textarea>
        <br><br>
        <textarea name="texto" placeholder="texto.." required class="py-20 bg-gray-0 block border-b-2 w-full h-60 text-xl outline-none"></textarea><br><br>
         <b class="text-white">Introduce las etiquetas separadas por comas</b><br>
        <input type="text" name="etiquetas" placeholder="ejemplo,ejemplo2..."/>
        <br><br>
        <b class="text-white">Selecciona una imagen</b><input type="file" name="image" required accept="image/*"/><br><br>
        <input type="submit" value="crear post"/>
        <br><br>
    </form>
</section>


@endsection