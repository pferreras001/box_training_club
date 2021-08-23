@extends('layout')

@section('section')

<section class="section section__perfil">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="text-white">
        <a href="{{route('modificar_perfil',['id' =>$user->id])}}">Editar perfil.</a>
        <img src="{{asset('/images/socios/'.$user->image)}}" width="200" height="250" >
        <h1>{{$user->apodo}}</h1>
        <h1>{{$user->name}} {{$user->surname}}</h1>
        <h1>{{$user->lema}}</h1>
        <h2>NIVEL: {{$nivel}}  PUNTOS :{{$puntos}}</h2>
        <h3>Dias inscrito : {{$dias}}</h3>
        @foreach($trofeos as $trofeo)
        <table class="text-white">
        <tbody>
          <tr>
            <td>{{$trofeo->skill_name}}</td>
            <?php $copas=explode(',',$trofeo->trofeos) ?>
            @foreach($copas as $copa)
            <td>@if($copa=='0')
                 Copa Bloqueada
                 @elseif($copa=='1')
                 Copa bronce
                @elseif($copa=='2')
                 Copa Plata
                @elseif($copa=='3')
                 Copa oro
                @endif
            </td>
            @endforeach
          </tr>
        </tbody>
        </table>
        @endforeach
    </div>
</section>


@endsection