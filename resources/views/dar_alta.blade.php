@extends('layout')

@section('section')

<section class="section section__dar_alta">
  <div class="dar_alta__container container">
    @isset($user)
    <span class="errmsg errmsg__dar_alta">*Ya existe el correo: {{$user->email}}</span>
    @endisset
    <form method="POST" action="{{route('send_register')}}">
    @csrf
      Email: <br>
      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required><br><br>
      Nombre: <br>
      <input type="text" name="nombre" placeholder="Nombre"  value="{{ old('nombre') }}" required><br><br>
      Apellidos: <br>
      <input type="text" name="apellidos" placeholder="Apellidos"  value="{{ old('apellidos') }}" required><br><br>
      Fecha de Nacimiento: <br>
      <input type="date" name="birth_date" value="{{ old('date') }}"><br><br>
        

      <input type="submit" class="btn btn__dar_alta" value="Dar de alta"/>

    </form>
  </div>

</section>


@endsection