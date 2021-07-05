@extends('layout')

@section('section')

<section class="section section__perfil">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="text-white">
        {{$user->name}} {{$user->surname}}
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