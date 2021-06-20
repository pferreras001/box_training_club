@extends('layout')

@section('section')

<section class="section section__users">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script src="{{ asset('/js/borrar.js')}}"></script>
<table class="text-white">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Modificar</th>
        <th>Dar de baja</th>
        <th>Editar contraseña</th>
      </tr>
    </thead>
    <tbody>
         @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{route('modificar',['id' =>$user->id])}}">modificar</a></td>
                <td><a onClick="eliminar({{$user->id}}); return false;" href="{{route('users')}}">dar de baja</a></td>
                <td><a  href="{{route('signup',['code' =>$user->confirmation_code])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> editar contraseña</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$users->links()}}
</section>


@endsection