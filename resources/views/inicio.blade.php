@extends('layout')

@section('section')

<section class="section section__home">

  <x-home/>

  <x-valores/>

  <x-365_dias/>

  <x-prueba/>

  <x-entrenamiento_personal/>

  <x-empresas/>

  <section class="section section__blog">
      <div id="entradas">
        @foreach($blogentrys as $blogentry)
            <div class ="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                <h2 class="text-yellow-300 font-bold text-5xl pb-4">
                        {{$blogentry->titulo}}
                </h2>
                <div class="text-white">
                    <img src="{{asset('/images/'.$blogentry->image)}}" height="300" width="300">
                </div>
                <div> 
                    <span class="text-yellow-300">
                        Escrito por <span class="font-bold italic text-white-500">{{$blogentry->autor}}</span> el dia {{date('d-m-Y',strtotime($blogentry->fecha))}}
                    </span>
                    <a  href="{{route('show_entry',['id' =>$blogentry->id])}}" class="uppercase text-white font-extrabold py-4 px-8 rounded-3xl"> seguir leyendo</a>
                </div>
            </div>
        @endforeach
    </div>
  </section>

  <x-tienda/>

  <!--<x-resenias/>-->

  <x-instagram/>

  <x-trabaja_con_nosotros/>

</section>


@endsection