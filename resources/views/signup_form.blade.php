@extends('layout')

@section('section')

<section class="section section__signup">
  <script src="{{ asset('/js/comprobarContras.js')}}"></script>
  <div class="dar_alta__container container">
    <h1> ¡Bienvenid@!<br> Introduce tu contraseña para poder crear tu cuenta.</h1>
    <form action="{{route('signup_update')}}" method="POST" onsubmit="return comprobarContras()">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}"/>
        Email: <input type="text" name="email" readonly value="{{$user->email}}"/><br><br>
        Contraseña: <input type="password" id="password" name="password"/><br><br>
        Confirma la contraseña: <input type="password" id="password2" name="password2"/><br><br>
        <input class="btn" type="submit" value="Registrarse"/> 
    </form>   
  </div>
<div>

    
</div>

</section>


@endsection