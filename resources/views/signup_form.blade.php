@extends('layout')

@section('section')

<section class="section section__signup">
<script src="{{ asset('/js/comprobarContras.js')}}"></script>
  <h1> ¡Bienvenido! introduce tu contraseña para poder crear tu cuenta.</h1>
<div>
    <form action="{{route('signup_update')}}" method="POST" onsubmit="return comprobarContras()">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}"/>
        email <input type="text" name="email" readonly value="{{$user->email}}"/><br><br>
        contraseña <input type="password" id="password" name="password"/><br><br>
        confirma la contraseña <input type="password" id="password2" name="password2"/><br><br>
        <input type="submit" value="registrarse"/> 
    </form>
    
</div>

</section>


@endsection