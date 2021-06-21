@extends('layout')

@section('section')

<section class="section section__recover_password">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <form method="POST" action="{{route('send_recover')}}">
    @csrf

      <input type="email" name="email" placeholder="Email"required><br>
      <button type="submit" class="btn btn__login">Recuperar contraseña</button><br>

    </form>
    @isset($fail)
    No se ha podido realizar la solicitud, comprueba los datos introducidos.
    @endisset
    @isset($hecho)
    Ya se ha enviado la solicitud, compruebe su bandeja de correo para las instrucciones de recuperacion.
    @endisset
</section>


@endsection