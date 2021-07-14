@extends('layout')

@section('section')

<section class="section section__show_entry">
  <div class="show_entry__container container">
    <div class="show_entry__entry">
      <p>
        <img class="show_entry__img" src="{{asset('/images/blog/'.$entry->image)}}">
        <h1>{{$entry->titulo}}</h1>
        {!! nl2br(e($entry->texto)) !!}
      </p>
    </div>
    <div class="show_entry__button">
      <button class="btn nav__btn" onclick="location.href='{{ route('blog') }}'">Volver</button>
    </div>
  </div>

    @if(session('tipo')=='admin')
    <a  href="{{route('edit_entry',['id' =>$entry->id])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Editar</a>
    <a  href="{{route('delete_entry',['id' =>$entry->id])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Borrar</a>
    @endif
</section>


@endsection