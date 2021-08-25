@extends('layout')

@section('section')

<section class="section section__blog">
  <div class="blog__container container">
    <form action="{{route('blog')}}" method="POST">
      @csrf
      <select id="etiquetas" name="etiquetas" onchange="this.form.submit()">
          @isset($data)
              @foreach($etiquetas as $etiqueta)
                    @if($etiqueta->etiqueta==$data)
                        <option selected="selected">{{$etiqueta->etiqueta}}</option>
                    @else
                        <option>{{$etiqueta->etiqueta}}</option>
                    @endif
              @endforeach
          @else
            <option selected="selected">--escoge una categoría--</option>
            @foreach($etiquetas as $etiqueta)
                <option>{{$etiqueta->etiqueta}}</option>
            @endforeach
          @endisset
      </select>
    </form>

    <div class="blog__noticias">
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
      <div style="width: 100%;"></div>
      {{$blogentrys->links()}}
    </div>

    @if(session('tipo')=='admin')
      <a href="{{route('create_entry')}}"><button class="btn"> Crear Entrada</button></a>
    @endif
  </div>
</section>


@endsection