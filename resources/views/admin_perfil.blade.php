@extends('layout')

@section('section')

<section class="section section__perfil">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="text-white">
        <a href="{{route('users')}}">Volver a gestionar los usuarios.</a>
       <h1>{{$user->name}} {{$user->surname}}</h1>
        <h2>NIVEL: {{$nivel}}</h2>
        @foreach($trofeos as $trofeo)
        <table class="text-white">
        <tbody>
          <tr>
            <td>{{$trofeo->skill_name}}</td>
            <?php $copas=explode(',',$trofeo->trofeos); $num=-1; $skill_name=$user->skill_name?>
            @foreach($copas as $copa)
              <?php $num=$num+1; ?>
            <td>@if($copa=='0')
                
                     Copa Bloqueada 
                    <a href="{{route('aumentarcopa',['id' =>$num.' '.$user->email.' '.$trofeo->skill_name])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Aumentar copa {{$num}}  de {{$trofeo->skill_name}}</a>

                 @elseif($copa=='1')
                
                    <a href="{{route('disminuircopa',['id' =>$num.' '.$user->email.' '.$trofeo->skill_name])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Disminuir copa {{$num}}  de {{$trofeo->skill_name}}</a>
                     Copa bronce 
                    <a href="{{route('aumentarcopa',['id' =>$num.' '.$user->email.' '.$trofeo->skill_name])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Aumentar copa {{$num}}  de {{$trofeo->skill_name}}</a>
                
                @elseif($copa=='2')
                
                    <a href="{{route('disminuircopa',['id' =>$num.' '.$user->email.' '.$trofeo->skill_name])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Disminuir copa {{$num}}  de {{$trofeo->skill_name}}</a>
                     Copa Plata 
                    <a href="{{route('aumentarcopa',['id' =>$num.' '.$user->email.' '.$trofeo->skill_name])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Aumentar copa {{$num}}  de {{$trofeo->skill_name}}</a>
                
                @elseif($copa=='3')
                
                    <a href="{{route('disminuircopa',['id' =>$num.' '.$user->email.' '.$trofeo->skill_name])}}" class="uppercase font-extrabold py-4 px-8 rounded-3xl"> Disminuir copa {{$num}}  de {{$trofeo->skill_name}}</a>
                     Copa oro
                
                @endif
            </td>
            @endforeach
          </tr>
        </tbody>
        </table>
        <br>
        @endforeach
    </div>
</section>


@endsection