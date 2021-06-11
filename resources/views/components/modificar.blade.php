<h1> Editar Miembro</h1>
<div>
    <form action="{{route('update')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$user->id}}"/>
        nombre <input type="text" name="name" value="{{$user->name}}"/><br><br>
        apellido <input type="text" name="surname" value="{{$user->surname}}"/><br><br>
        email <input type="text" name="email" value="{{$user->email}}"/><br><br>
        <input type="submit" value="modificar"/> 
    </form>
    
</div>