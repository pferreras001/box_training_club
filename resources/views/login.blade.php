@extends('layout')

@section('section')

<section class="section login__section">

  <div data-aos="flip-left" class="container login__container">

    <?php require('svg/login/logotipo.svg')?>

    <h3>VIP ZONE</h3>

    <form method="POST" action="{{route('session_start')}}">
    @csrf

    <fieldset class="fieldset fieldset__login">
        @isset($fail)
        <span class="errmsg errmsg__login">{{ __('login.incorrecto') }}</span>
        @endisset
        
        @isset($email)
            <input type="text" name="email" value="{{ $email }}"><br>
        @else
            <input type="text" name="email" placeholder="{{ __('login.email') }}"><br>
        @endisset
      <input type="password" name="password" placeholder="{{ __('login.contrasena') }}"><br>

      <button type="submit" class="btn btn__login">{{ __('login.iniciar') }}</button><br>

      <span><a href="{{route('recover_password')}}">{{ __('login.olvidado') }}</a></span>

    </fieldset>

    </form>

    <a href="{{route('contacto')}}"><h3>{{ __('login.unete') }}</h3></a>

  </div>


</section>


@endsection