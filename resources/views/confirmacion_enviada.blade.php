@extends('layout')

@section('section')

<section class="section confirmacion_enviada__section">
  <div class="contacto_enviado__container container">
    <h1>¡El correo de confimacion ha sido enviado!</h1>
    <a class="btn" href="{{route('users')}}">Volver a la zona de usuarios</a>
  </div>

</section>


@endsection