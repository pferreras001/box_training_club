@extends('layout')

@section('section')

<section class="section dar_alta__section">
    <form method="POST" action="{{route('send_register')}}">
    @csrf

      <input type="email" name="email" placeholder="Email" required><br>
      <input type="text" name="nombre" placeholder="Nombre" required><br>
      <input type="text" name="apellidos" placeholder="Apellidos" required><br>
      <input type="date" name="birth_date"><br>
        

      <button type="submit" class="btn btn__login">dar de alta</button><br>

    </form>

</section>


@endsection