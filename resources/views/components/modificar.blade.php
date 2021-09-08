<div class="modificar__container container">
  <form action="{{route('update')}}" enctype="multipart/form-data" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{$user->id}}"/>
      Apodo:<br>
      <input type="text" name="apodo" value="{{$user->apodo}}"/><br><br>
      Nombre:<br> 
      <input type="text" name="name" value="{{$user->name}}"/><br><br>
      Apellido:<br>
      <input type="text" name="surname" value="{{$user->surname}}"/><br><br>
      Lema:<br>
      <input type="text" name="lema" value="{{$user->lema}}"/><br><br>
      Email:<br>
      <input type="text" name="email" value="{{$user->email}}"/><br><br>
      <b class="text-white">Selecciona una nueva imagen en caso de desear modificarla</b><input type="file" name="image" accept="image/*"/><br><br>
      <input class="btn btn__modificar" type="submit" value="Modificar"/> 
  </form> 
</div>