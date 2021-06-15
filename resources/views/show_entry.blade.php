@extends('layout')

@section('section')

<section class="section section__show_entry">
    <h1>{{$entry->titulo}}</h1>
    <span class="text-yellow-300">
                Escrito por <span class="font-bold italic text-white-500">{{$entry->autor}}</span> el dia {{date('d-m-Y',strtotime($entry->fecha))}}
    </span><br><br>
    <p>{{$entry->texto}}</p>
    <br><br>
    <a  href="{{route('edit_entry',['id' =>$entry->id])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Editar</a>
    <a  href="{{route('delete_entry',['id' =>$entry->id])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Borrar</a>
</section>


@endsection