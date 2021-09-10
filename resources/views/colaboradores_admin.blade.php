@extends('layout')

@section('section')

<section class="section section__colaboradores_admin">
  <script src="{{ asset('/js/borrarcolab.js')}}"></script>
  <div class="colaboradores__container container">
    <a href="{{route('anadir_colab')}}"><button class="btn btn__colaboradores_admin">Añadir colaboradores</button>
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
    <ul>
      <li><a class="btn" href="{{route('editar_colab',['id' =>$colaborador->id])}}">Editar</a></li>
      <li><a onClick="eliminarcolab({{$colaborador->id}}); return false;" class="btn" href="{{route('gestionar_colaboradores')}}">Eliminar</a></li>
    </ul>
    @endforeach
  </div>
</section>
@endsection