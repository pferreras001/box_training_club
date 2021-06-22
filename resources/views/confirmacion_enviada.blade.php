@extends('layout')

@section('section')

<section class="section confirmacion_enviada__section">

  <h1 class="text-white">¡El correo de confimacion ha sido enviado!</h1>
    <a class="text-white" href="{{route('users')}}">volver a la zona de usuarios</a>


</section>


@endsection