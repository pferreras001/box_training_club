@extends('layout')

@section('section')

<section class="section section__edit_entry">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl text-yellow-200">Modificar entrada</h1>
        </div>
    </div>
    <div>
        <form action="{{route('update_entry')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$entry->id}}"/>
            titulo <input type="text" name="titulo" value="{{$entry->titulo}}"/><br><br>
            autor <input type="text" name="autor" value="{{$entry->autor}}"/><br><br>
            descripcion <input type="text" name="descripcion" value="{{$entry->descripcion}}"/><br><br>
            texto <input type="text" name="texto" value="{{$entry->texto}}"/><br><br>
            //TO DO-> EDITAR IMAGEN.
            etiquetas <input type="text" name="etiquetas" value="{{$entry->etiquetas}}"/><br><br>
            <input type="submit" value="modificar"/> 
        </form>
    </div>
</section>


@endsection