@extends('layout')

@section('section')

<section class="section section__home">

  <x-home/>

  <x-valores/>

  <x-365_dias/>

  <x-prueba/>

  <x-cuotas_home/>

  <x-entrenamiento_personal/>

  <x-empresas/>

  <section data-aos="fade-right" class="section section__noticias">
    <div class="noticias__container container">
      <h1 class="section-title">Noticias ></h1>
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
  </section>

  <x-resenias/>

  <x-instagram/>

  <x-trabaja_con_nosotros/>

</section>


@endsection