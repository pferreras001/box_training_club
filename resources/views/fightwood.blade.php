@extends('layout')

@section('section')

<section class="section section__fightwood">
  <div class="users__container container">
  <h1>FIGHTWOOD</h1>
  <div><img src="{{asset('/images/fightwood/fightwood.png')}}" height="200" width="200"/></div>
  </div>
@isset($admin)
 <form action="{{route('update_fightwood')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="file" name="imagen" accept="image/*"/><br><br>
        <input class="btn btn__dar_alta" type="submit" value="Actualizar Fightwood"/> 
    </form>
@endisset
</section>


@endsection