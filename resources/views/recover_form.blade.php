@extends('layout')

@section('section')

<section class="section section__recover_form">

  <h1> Editar Miembro</h1>
<div class="text-white">
    <form action="{{route('update_pass')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}"/>
        email <input type="text" name="email" readonly value="{{$user->email}}"/><br><br>
        contraseña nueva <input type="password" name="password"/><br><br>
        repite la contraseña <input type="password" name="password2"/><br><br>
        <input type="submit" value="cambiar contraseña"/> 
    </form>
    
</div>

</section>


@endsection