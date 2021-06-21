@extends('layout')

@section('section')

<section class="section dar_alta__section">
    @isset($user)
    <label class="w-1/5 mb-4 text-white bg-red-700 rounded-2x py-4">
            Ya existe el correo: {{$user->email}}
    </label>
    @endisset
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