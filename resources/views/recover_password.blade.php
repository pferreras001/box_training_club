@extends('layout')

@section('section')

<section class="section section__recover_password">
  <div class="recover_password__container container">
    @isset($fail)
    <span class="errmsg errmsg__login">*No se ha podido realizar la solicitud, comprueba los datos introducidos</span>
    @endisset
    @isset($hecho)
    <span class="errmsg errmsg__login">*Ya se ha enviado la solicitud, compruebe su bandeja de correo para las instrucciones de recuperacion</span>
    @endisset
    <form method="POST" action="{{route('send_recover')}}">
    @csrf
      <input type="email" name="email" placeholder="Email"required><br>
      <button type="submit" class="btn btn__login">Recuperar contraseña</button>
    </form>
  </div>
</section>

@endsection