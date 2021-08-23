<h1> Editar Miembro</h1>
<div>
    <form action="{{route('update')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}"/>
        apodo <input type="text" name="apodo" value="{{$user->apodo}}"/><br><br>
        nombre <input type="text" name="name" value="{{$user->name}}"/><br><br>
        apellido <input type="text" name="surname" value="{{$user->surname}}"/><br><br>
        lema <input type="text" name="lema" value="{{$user->lema}}"/><br><br>
        email <input type="text" name="email" value="{{$user->email}}"/><br><br>
        <b class="text-white">Selecciona una nueva imagen en caso de desear modificarla</b><input type="file" name="image" accept="image/*"/><br><br>
        <input type="submit" value="modificar"/> 
    </form>
    
</div>