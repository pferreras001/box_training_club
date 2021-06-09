@extends('layout')

@section('section')

<section class="section section__users">

  @foreach($user in $users)

    {{ $user->$id }}

  @endforeach

</section>


@endsection