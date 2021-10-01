@extends('layout')

@section('section')

<section class="section section__perfil">
  <div class="perfil__container container">
    <div class="perfil__info">
      <div class="div_img">
        <div><img src="{{asset('/images/socios/'.$user->image)}}"/></div>
      </div>
      <div class="div_name">
        <div>
          <h1>{{$user->apodo}}</h1>
          <h3>{{$user->name}} {{$user->surname}}</h3>
        </div>
      </div>
      <div class="div_rank puntuacion">
        <div>Rank.<span>{{$rango}}</span></div>
      </div>
      <div class="div_lema">
        <div><h2>{{$user->lema}}</h2></div>
      </div>
    </div>
    <div class="perfil__puntuaciones">
      <div class="div_lvl puntuacion">
        <div>Lvl.<span>{{$nivel}}</span></div>
      </div>
      <div class="div_pnts puntuacion">
        <div>Pnts.<span>{{$puntos}}</span></div>
      </div>
      <div class="div_dias puntuacion">
        <div>Días de Socio.<span>{{$dias}}</span></div>
      </div>
    </div>
    <div class="perfil__copas">
      @foreach($trofeos as $trofeo)
      <div class="perfil__disciplina">
        <h1>{{$trofeo->skill_name}}</h1>
        <div class="perfil__palmares">
        <?php $copas=explode(',',$trofeo->trofeos) ?>
        <?php $num = 0?>
        @foreach($copas as $copa)
        <div>
        <?php $numcopa = explode('/',$copa)[0]?>
        <?php $nombrecopa = explode('/',$copa)[1]?>
          @if($numcopa=='0')
          <span class="copa_bloqueada"><?php require('svg/perfil/punio.svg') ?></span>
          <h3>{{$nombrecopa}}</h3>
              @if($num==0)
                <h3>0/1</h3>
              @else
                <h3>0/3</h3>
              @endif
          @elseif($numcopa=='1')
          <span class="copa_bronce"><?php require('svg/perfil/punio.svg') ?></span>
          <h3>{{$nombrecopa}}</h3>
          <h3>1/3</h3>
          @elseif($numcopa=='2')
          <span class="copa_plata"><?php require('svg/perfil/punio.svg') ?></span>
          <h3>{{$nombrecopa}}</h3>
          <h3>2/3</h3>
          @elseif($numcopa=='3')
          <span class="copa_oro"><?php require('svg/perfil/punio.svg') ?></span>
          <h3>{{$nombrecopa}}</h3>
              @if($num==0)
                <h3>1/1</h3>
              @else
                <h3>3/3</h3>
              @endif
          @endif
          
          <ul>
            <li><a class="btn" href="{{route('disminuircopa',['id' =>$num.','.$user->email.','.$trofeo->skill_name])}}">-</a></li>
            <li><a class="btn" href="{{route('aumentarcopa',['id' =>$num.','.$user->email.','.$trofeo->skill_name])}}">+</a></li>
          </ul>
        </div>
        <?php $num = $num + 1?>
        @endforeach
        </div>
      </div>
      @endforeach

    <!--<div class="text-white">
        <a href="{{route('modificar_perfil',['id' =>$user->id])}}">Editar perfil.</a>
        <img src="{{asset('/images/socios/'.$user->image)}}" width="200" height="250" >
        <h1>{{$user->apodo}}</h1>
        <h1>{{$user->name}} {{$user->surname}}</h1>
        <h1>{{$user->lema}}</h1>
        <h2>NIVEL: {{$nivel}}  PUNTOS :{{$puntos}}</h2>
        <h3>Dias inscrito : {{$dias}}</h3>
        <h3>Rango : {{$rango}}</h3>
        @foreach($trofeos as $trofeo)
        <table class="text-white">
        <tbody>
          <tr>
            <td>{{$trofeo->skill_name}}</td>
            <?php $copas=explode(',',$trofeo->trofeos) ?>
            <?php $num = 0?>
            @foreach($copas as $copa)
            <?php $numcopa = explode('/',$copa)[0]?>
            <?php $nombrecopa = explode('/',$copa)[1]?> 
            <td>
                {{$nombrecopa}} <br>
                @if($numcopa=='0')
                    @if($num==0)
                        0/1
                    @else
                        0/3
                    @endif
                 @elseif($numcopa=='1')
                 1/3
                @elseif($numcopa=='2')
                 2/3
                @elseif($numcopa=='3')
                    @if($num==0)
                        1/1
                    @else
                        3/3
                    @endif
                @endif
            </td>
            <?php $num = 1?>
            @endforeach
          </tr>
        </tbody>
        </table>
        @endforeach
    </div>-->
    </div>
  </div>
<!--<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="text-white">
        <a href="{{route('users')}}">Volver a gestionar los usuarios.</a>
      <img src="{{asset('/images/socios/'.$user->image)}}" width="200" height="250" >
        <h1>{{$user->apodo}}</h1>
        <h1>{{$user->name}} {{$user->surname}}</h1>
        <h1>{{$user->lema}}</h1>
        <h2>NIVEL: {{$nivel}}  PUNTOS :{{$puntos}}</h2>
        <h3>Dias inscrito : {{$dias}}</h3>
        <h3>Rango : {{$rango}}</h3>
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
    </div>-->
</section>


@endsection