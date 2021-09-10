@extends('layout')

@section('section')

<section class="section section__ranking">
    <table class="text-white">
        <thead>
          <tr>
            <th>Rango</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
          </tr>
        </thead>
        <tbody>
            <?php $num=1;
             for ($i = 0; $i <= count($rankingUsers)-1; $i++) {
                    echo '<tr>';
                        echo '<td>'.$num.'</td>';?>
                        <td><img src="{{asset('/images/socios/'.$rankingUsers[$i]->image)}}" height="20" width="20"/></td>
                        <?php echo '<td>'.$rankingUsers[$i]->name.'</td>';
                        echo '<td>'.$rankingUsers[$i]->surname.'</td>';
                    echo '</tr>';
                $num++;
                }
            ?>
        </tbody>
    </table>  
</section>


@endsection