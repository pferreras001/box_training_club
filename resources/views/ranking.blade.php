@extends('layout')

@section('section')

<section class="section section__ranking">
  <div class="users__container container">
    <table class="text-white">
        <thead>
          <tr>
            <th>Ranking</th>
            <th>Foto</th>
            <th>Apodo</th>
            <th>Lema</th>
          </tr>
        </thead>
        <tbody>
            <?php $num=1;
             for ($i = 0; $i <= count($rankingUsers)-1; $i++) {
                    echo '<tr>';
                        echo '<td>'.$num.'</td>';?>
                        <td><div><img src="{{asset('/images/socios/'.$rankingUsers[$i]->image)}}" height="20" width="20"/></div></td>
                        <?php echo '<td>'.$rankingUsers[$i]->apodo.'</td>';
                        echo '<td>'.$rankingUsers[$i]->lema.'</td>';
                    echo '</tr>';
                $num++;
            }
            ?>
        </tbody>
    </table>
  </div>
</section>


@endsection