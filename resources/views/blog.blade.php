@extends('layout')

@section('section')

<section class="section section__blog">
  <div class="blog__container container">
    <form action="{{route('blog')}}" method="POST">
      @csrf
      <select id="etiquetas" name="etiquetas" onchange="this.form.submit()">
        <option selected="selected">--escoge un etiqueta--</option>
        <option>Todos</option>
        @foreach($etiquetas as $etiqueta)
            <option>{{$etiqueta->etiqueta}}</option>
        @endforeach
      </select>
    </form>

    <div class="noticias__entrys">
      @foreach($blogentrys as $blogentry)
        <div class="noticias__entry">
          <div class="top">
            <img src="{{asset('/images/blog/'.$blogentry->image)}}" alt="{{ $blogentry->titulo }}">
            <h2>{{ $blogentry->titulo }}</h2>
          </div>
          <div class="bottom">
            <div><p>{{ $blogentry->texto }}</p></div>
            <div><a href="{{route('show_entry',['id' =>$blogentry->id])}}">Leer más...</a></div>
          </div>
        </div>
      @endforeach
    </div>
    {{$blogentrys->links()}}
  </div>
</section>


@endsection