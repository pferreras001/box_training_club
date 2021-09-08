@extends('layout')

@section('section')

<section class="section section__perfil">
  <div class="perfil__container container">
    <div class="perfil__info">
      <div class="div_img">
        <img src="{{asset('/images/socios/'.$user->image)}}"/>
      </div>
      <div class="div_name">
        <h1>{{$user->apodo}}</h1>
        <h3>{{$user->name}} {{$user->surname}}</h3>
      </div>
      <div class="div_rank puntuacion">
        Rank.<span>{{$rango}}</span>
      </div>
      <div class="div_lema">
        {{$user->lema}}
      </div>
    </div>
    <div class="perfil__puntuaciones">
      <div class="div_lvl puntuacion">
        Lvl.<span>{{$nivel}}</span>
      </div>
      <div class="div_pnts puntuacion">
        Pnts.<span>{{$puntos}}</span>
      </div>
      <div class="div_dias puntuacion">
        Días de Socio.<span>{{$dias}}</span>
      </div>
    </div>
    <div class="perfil__copas">
      <div class="perfil__manual">
        <div>
          <div class="copa_oro"><?php require('svg/perfil/punio.svg') ?></div>
          <h3>ORO</h3>
        </div>
        <div>
          <div class="copa_plata"><?php require('svg/perfil/punio.svg') ?></div>
          <h3>PLATA</h3>
        </div>
        <div>
          <div class="copa_bronce"><?php require('svg/perfil/punio.svg') ?></div>
          <h3>BRONCE</h3>
        </div>
        <div>
          <div class="copa_bloqueada"><?php require('svg/perfil/punio.svg') ?></div>
          <h3>BLOQUEADO</h3>
        </div>
      </div>
      <div class="perfil__palmares">
        @foreach($trofeos as $trofeo)
        <div class="perfil__disciplina">
          <h1>{{$trofeo->skill_name}}</h1>
          <?php $copas=explode(',',$trofeo->trofeos) ?>
          @foreach($copas as $copa)
          <div class="copa"></div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
    <div class="text-white">
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