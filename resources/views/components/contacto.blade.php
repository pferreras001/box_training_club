<section class="section section__contacto">
  <div class="contacto__telefono">
    <h1 data-aos="fade-right">
      CONTACTA CON NOSOTROS VÍA <span>TELÉFONO </span>O <span>WHATSAPP </span>AL <span>600 46 69 67</span>
    </h1>
  </div>
  <div class="contacto__form">
    <div data-aos="fade-right" class="contacto__form__left">
      <form method="POST" action="{{route('contacto')}}">
      @csrf
        <input type="email" name="email" required="true" placeholder="Email"><br>
          @isset($asunto)
            <input type="text" name="asunto" required="true" value="{{$asunto}}"><br>
          @else
          <input type="text" name="asunto" required="true" placeholder="Asunto"><br>
         @endisset
        <textarea name="mensaje" required="true" placeholder="Mensaje..."></textarea><br>

        <button type="submit" class="btn btn__contacto">Enviar</button><br>

      </form>
    </div>
    <div data-aos="fade-left" class="contacto__form__right">
      <h1>
        ENVÍANOS UN <span>MENSAJE</span> CON TUS PREGUNTAS.<br><br>
        ¡TE RESPONDEREMOS <span>LO ANTES POSIBLE</span>!
      </h1>
    </div>
  </div>
  <div class="contacto__maps">
    <div class="contacto__maps__info">
      <div class="contacto__yellow_box contacto__yellow_box__transporte">
        <a href="">Descargar información de transporte y comunicaciones</a>
      </div>
      <div class="contacto__yellow_box contacto__yellow_box__contacto">
        <ul>
          <li><a href="https://www.google.com/maps/place/Box+Training+Club/@43.309273,-1.967805,17z/data=!4m5!3m4!1s0x0:0x455f4dbd8ebd5839!8m2!3d43.3092732!4d-1.9678051?hl=es">Madalena Jauregiberri 4 - Donostia 20014</a></li>
          <li><a href="tel:+34600466967">+34 600 46 69 67</a></li>
          <li><a href="tel:+34843631510">+34 843 63 15 10</a></li>
          <li><a href="mailto:info@boxtrainingclub.com">info@boxtrainingclub.com</a></li>
        </ul>
      </div>     
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.2381816993907!2d-1.9699937845133804!3d43.30927317913466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x455f4dbd8ebd5839!2sBox%20Training%20Club!5e0!3m2!1ses!2ses!4v1626081590774!5m2!1ses!2ses" style="border:0; -webkit-filter: grayscale(100%);;" allowfullscreen="" loading="lazy">
    </iframe>
  </div>
</section>