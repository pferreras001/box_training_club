<section data-aos="fade-up" class="section footer__section">
  <div class="footer__container">
    <div class="footer__left">
      <a href="{{route('inicio')}}"><?php require('svg/navbar/logo.svg')?></a>
      <ul>
        <li><a href="https://www.google.com/maps/place/Box+Training+Club/@43.309273,-1.967805,17z/data=!4m5!3m4!1s0x0:0x455f4dbd8ebd5839!8m2!3d43.3092732!4d-1.9678051?hl=es">Madalena Jauregiberri 4 - Donostia 20014</a></li>
        <li><a href="tel:+34600466967">+34 600 46 69 67</a></li>
        <li><a href="tel:+34843631510">+34 843 63 15 10</a></li>
        <li><a href="mailto:info@boxtrainingclub.com">info@boxtrainingclub.com</a></li>
      </ul>
    </div>
    <div class="footer__right">
      <ul>
        <li><a href="https://www.instagram.com/boxtrainingclub/" target="_blank"><?php require('imports/svg/instagram.svg')?></a></li>
        <li><a href="https://www.facebook.com/boxtrainingclub" target="_blank"><?php require('imports/svg/facebook1.svg')?></a></li>
        <li><a href="https://www.tiktok.com/@boxtrainingclub" target="_blank"><?php require('svg/footer/tik-tok.svg')?></a></li>
        <li><a href="https://www.youtube.com/user/BoxTrainingDonostia" target="_blank"><?php require('imports/svg/youtube.svg')?></a></li>
        <li><a href="https://www.linkedin.com/company/box-training-club" target="_blank"><?php require('svg/footer/linkedin.svg')?></a></li>
        <li><a href="https://twitter.com/BOXTRAININGCLUB target="_blank"><?php require('imports/svg/twitter.svg')?></a></li>
      </ul>
    </div>
  </div>
  <div class="footer__bottom">
    <span>Box Training Club © {{ now()->year }} | <a href="{{route('aviso_legal')}}">Aviso Legal</a></span>
  </div>
</section>