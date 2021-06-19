@extends('layout')

@section('section')

<section class="section login__section">

  <div data-aos="flip-left" class="container login__container">

    <?php require('svg/login/logotipo.svg')?>

    <form method="POST" action="{{route('session_start')}}">
    @csrf

    <fieldset class="fieldset fieldset__login">

      <span class="errmsg errmsg__login">*Usuario o contraseña incorrectos</span>

      <input type="text" name="email" placeholder="Email" value="{{ $email }}"><br>
      <input type="password" name="password" placeholder="Contraseña"><br>

      <button type="submit" class="btn btn__login">Iniciar Sesión</button><br>

      <span><a href="#">He olvidado mi contraseña</a></span>

    </fieldset>

    </form>

  </div>


</section>


@endsection