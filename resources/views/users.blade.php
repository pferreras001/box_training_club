@extends('layout')

@section('section')

<section class="section section__users">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script src="{{ asset('/js/borrar.js')}}"></script>
    @isset($senor)
        <script>alert("correo de confirmación reenviado")</script>
    @endisset
    <form action="{{route('search_user')}}" method="POST">
        @csrf
        Barra de busqueda: <input type="text" name='findedUser'>
        <input type="submit" value="Buscar Usuario">
    </form>
    @isset($resultado)
        Hay {{$resultado}} resultados.<br>
    @endisset
<table class="text-white">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Modificar</th>
        <th>Dar de baja</th>
        <th>Confirmado</th>
        <th>Reenviar Mensaje de Confirmación</th>
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
                <td>@if($user->confirmed==true)
                        SI
                    @else
                        NO
                    @endif
                </td>
                <td>@if($user->confirmed==true)
                        ¡Usuario ya confirmado!
                    @else
                       <a  href="{{route('send_signup_mail',['id' =>$user->id])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Reenviar Correo de Confirmacion</a>
                    @endif
                </td>
                <td>
                    <a  href="{{route('admin_perfil',['id' =>$user->email])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Gestionar Trofeos</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    <?php
    if (!isset($resultado))
        $users->links()
    ?>
    
</section>


@endsection