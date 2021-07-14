@extends('layout')

@section('section')

<section class="section section__blog">
  <div class="blog__container container">
    <form action="{{route('blog')}}" method="POST">
      @csrf
      <select id="etiquetas" name="etiquetas" onchange="this.form.submit()">
        <option selected="selected">Todos</option>
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
  </div>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl text-yellow-200">Entradas del blog</h1>
        </div>
    </div>
    <form action="{{route('blog')}}" method="POST">
        @csrf
        <select id="etiquetas" name="etiquetas" onchange="this.form.submit()">
            <option selected="selected">--escoge un etiqueta--</option>
            <option>ninguna</option>
            @foreach($etiquetas as $etiqueta)
                <option>{{$etiqueta->etiqueta}}</option>
            @endforeach
        </select>
    </form>
    <a href="{{route('create_entry')}}">insertar una entrada</a>
    <div id="entradas">
        @foreach($blogentrys as $blogentry)
            <div class ="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                <div class="text-white">
                    <img src="{{asset('/images/blog/'.$blogentry->image)}}" height="300" width="300">
                </div>
                <div> 
                    <h2 class="text-yellow-300 font-bold text-5xl pb-4">
                        {{$blogentry->titulo}}
                    </h2>
                    <span class="text-yellow-300">
                        Escrito por <span class="font-bold italic text-white-500">{{$blogentry->autor}}</span> el dia {{date('d-m-Y',strtotime($blogentry->fecha))}}
                    </span>
                    <a  href="{{route('show_entry',['id' =>$blogentry->id])}}" class="uppercase text-white font-extrabold py-4 px-8 rounded-3xl"> seguir leyendo</a>
                </div>
            </div>
        @endforeach
    </div>
    {{$blogentrys->links()}}
</section>


@endsection