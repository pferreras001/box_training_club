@extends('layout')

@section('section')

<section class="section section__colaboradores_admin">
  <div class="colaboradores_admin__container container">
    <script src="{{ asset('/js/borrarcolab.js')}}"></script>
    <a href="{{route('anadir_colab')}}"><button class="btn btn__colaboradores_admin">Añadir colaboradores</button></a>
    <div class="colaboradores_admin__colaboradores">
      <div class="colaboradores_admin__colaborador">
        @foreach($colaboradores as $colaborador)
        <div class="div-img">
          <img src="{{asset('/images/colaboradores_socios/'.$colaborador->imagen)}}"/>
        </div>
        <h3>{{$colaborador->nombre}}</h3>
        <ul>
          <li><a href="{{route('editar_colab',['id' =>$colaborador->id])}}">Editar</a></li>
          <li><a onClick="eliminarcolab({{$colaborador->id}}); return false;" href="{{route('gestionar_colaboradores')}}">Eliminar</a></li>
        </ul>
        <div>
            @if($colaborador->link_web!=null)
                <a href="{{$colaborador->link_web}}" target="_blank" class="external"><img src="{{asset('/images/colaboradores_socios/'.$colaborador->imagen)}}" height="300" width="300"></a>
            
            @else
                <img src="{{asset('/images/colaboradores_socios/'.$colaborador->imagen)}}" height="300" width="300">
            
            @endif
        </div>
        <div>
            <h1>{{$colaborador->nombre}}</h1>
            <a href="{{route('editar_colab',['id' =>$colaborador->id])}}">Editar Colaborador</a>
            <a onClick="eliminarcolab({{$colaborador->id}}); return false;" href="{{route('gestionar_colaboradores')}}">Eliminar Colaborador</a>
        </div>
        @endforeach     
      </div> 
    </div> 
  </div>
@endsection