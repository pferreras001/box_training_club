<section data-aos="fade-up" class="section footer__section">
  <div class="footer__container">
    <div class="footer__left">
      <?php require('svg/navbar/logo.svg')?>
      <ul>
        <li><a href="">Madalena Jauregiberri - Donostia 20014</a></li>
        <li><a href="">+34 600 46 69 67</a></li>
        <li><a href="">info@boxtrainingclub.com</a></li>
      </ul>
    </div>
    <div class="footer__right">
      <ul>
        <li><a href="https://www.instagram.com/boxtrainingclub/"><?php require('imports/svg/instagram.svg')?></a></li>
        <li><a href="https://www.facebook.com/boxtrainingclub"><?php require('imports/svg/facebook1.svg')?></a></li>
        <li><a href="https://www.tiktok.com/@boxtrainingclub"><?php require('svg/footer/tik-tok.svg')?></a></li>
        <li><a href="https://www.youtube.com/user/BoxTrainingDonostia"><?php require('imports/svg/youtube.svg')?></a></li>
        <li><a href="https://www.linkedin.com/company/box-training-club"><?php require('svg/footer/linkedin.svg')?></a></li>
      </ul>
    </div>
  </div>
  <div class="footer__bottom">
    <span>Box Training Club © {{ now()->year }} | <a href="{{route('aviso_legal')}}">Aviso Legal</a></span>
  </div>
</section>