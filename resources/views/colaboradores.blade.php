@extends('layout')

@section('section')

<section class="section section__colaboradores">
  <div class="colaboradores__container container">
    @foreach($colaboradores as $colaborador)
    <a target="_blank" href="{{$colaborador->link_web}}">
    <div class="colaboradores__colaborador">
      <div class="div_img">
        <img src="{{asset('/images/colaboradores_socios/'.$colaborador->imagen)}}"/>
      </div>
      <div class="div_info">
        <h1>{{$colaborador->nombre}}</h1>
        <div>
          {{$colaborador->descripcion}}
        </div>
      </div>
    </div>
    </a>
    @endforeach
  </div>
</section>
@endsection