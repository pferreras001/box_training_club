@extends('layout')

@section('section')

<section class="section section__perfil">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="text-white">
        {{$user->name}} {{$user->surname}}
    </div>
</section>


@endsection