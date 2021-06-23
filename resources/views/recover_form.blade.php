@extends('layout')

@section('section')

<section class="section section__recover_form">
<script src="{{ asset('/js/comprobarContras.js')}}"></script>
  <h1> Editar Miembro</h1>
<div class="text-white">
    <form action="{{route('update_pass')}}" method="POST" onsubmit="return comprobarContras()">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}"/>
        email <input type="text" name="email" readonly value="{{$user->email}}"/><br><br>
        contraseña nueva <input type="password" id="password" name="password"/><br><br>
        repite la contraseña <input type="password" id="password2" name="password2"/><br><br>
        <input type="submit" value="cambiar contraseña"/> 
    </form>
    
</div>

</section>


@endsection