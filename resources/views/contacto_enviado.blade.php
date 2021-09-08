@extends('layout')

@section('section')

<section class="section contacto_enviado__section">
  <div class="contacto_enviado__container container">
    <h1>¡El mensaje ha sido enviado!</h1>
    <a class="btn" href="{{route('inicio')}}">Volver al inicio</a>
  </div>
</section>


@endsection