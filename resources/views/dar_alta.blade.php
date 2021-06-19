@extends('layout')

@section('section')

<section class="section dar_alta__section">
    <form method="POST" action="{{route('send_register')}}">
    @csrf

      <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required><br>
      <input type="text" name="nombre" placeholder="Nombre"  value="{{ old('nombre') }}" required><br>
      <input type="text" name="apellidos" placeholder="Apellidos"  value="{{ old('apellidos') }}" required><br>
      <input type="date" name="birth_date" value="{{ old('date') }}"><br>
        

      <button type="submit" class="btn btn__login">dar de alta</button><br>

    </form>

</section>


@endsection