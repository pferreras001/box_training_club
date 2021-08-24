@extends('layout')

@section('section')

<section class="section login__section">

  <div data-aos="flip-left" class="container login__container">

    <?php require('svg/login/logotipo.svg')?>

    <form method="POST" action="{{route('session_start')}}">
    @csrf

    <fieldset class="fieldset fieldset__login">
        @isset($fail)
        <span class="errmsg errmsg__login">*Usuario o contraseña incorrectos</span>->hay que hacer visible este span
        @endisset
        
        @isset($email)
            <input type="text" name="email" value="{{ $email }}"><br>
        @else
            <input type="text" name="email" placeholder="Email"><br>
        @endisset
      <input type="password" name="password" placeholder="Contraseña"><br>

      <button type="submit" class="btn btn__login">Iniciar Sesión</button><br>

      <span><a href="{{route('recover_password')}}">He olvidado mi contraseña</a></span>

    </fieldset>

    </form>

  </div>


</section>


@endsection