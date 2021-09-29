@extends('layout')

@section('section')

<section class="section section__fightwood">
  <div class="fightwood__container container">
    <div><img src="{{asset('/images/fightwood/fightwood.png')}}"/></div>
    @isset($admin)
     <form action="{{route('update_fightwood')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="file" name="imagen" accept="image/*"/><br><br>
            <input class="btn btn__dar_alta" type="submit" value="Actualizar"/> 
        </form>
    @endisset
  </div>
</section>


@endsection