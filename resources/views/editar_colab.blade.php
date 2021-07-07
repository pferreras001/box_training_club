@extends('layout')

@section('section')

<section class="section section__edit_colab">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl text-yellow-200">Modificar colaborador</h1>
        </div>
    </div>
    <div>
        <form action="{{route('update_colab')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$colaborador->id}}"/>
            nombre <input type="text" name="nombre" value="{{$colaborador->nombre}}"/><br><br>
            link <input type="text" name="link" value="{{$colaborador->link_web}}"/><br><br>
            <input type="submit" value="modificar"/> 
        </form>
    </div>
</section>


@endsection