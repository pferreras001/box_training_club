@extends('layout')

@section('section')

<section class="section section__colaboradores_admin">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <a href="{{route('anadir_colab')}}">Añadir colaboradores</a>
    @foreach($colaboradores as $colaborador)
    <div>
        @if($colaborador->link_web!=null)
            <a href="{{$colaborador->link_web}}" target="_blank" class="external"><img src="{{asset('/images/colaboradores_socios/'.$colaborador->imagen)}}" height="300" width="300"></a>
        
        @else
            <img src="{{asset('/images/colaboradores_socios/'.$colaborador->imagen)}}" height="300" width="300">
        
        @endif
    </div>
    <div>
        <h1>{{$colaborador->nombre}}</h1>
        <a href="{{route('editar_colab',['id' =>$colaborador->id])}}">Editar colaborador</a>
        <a href="{{route('eliminar_colab',['id' =>$colaborador->id])}}">Eliminar colaborador</a>
    </div>
    @endforeach


@endsection