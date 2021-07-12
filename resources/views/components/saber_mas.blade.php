<section class="section section__saber_mas">
  <div class="saber_mas__container container">
    <form method="POST" action="">
      
      @csrf

      <span class="errmsg errmsg__login">*Usuario o contraseña incorrectos</span>

      <input type="text" name="email" placeholder="Email" value=""><br>
      <input type="password" name="password" placeholder="Contraseña"><br>

      <button type="submit" class="btn btn__login">Iniciar Sesión</button><br>

    </form>  
  </div>
</section>