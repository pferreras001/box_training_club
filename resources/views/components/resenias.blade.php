<section data-aos="fade-right" class="section section__resenias">
  <div class="resenias__container container">
    <h1 class="section-title">{{ __('opiniones.opiniones') }} ></h1>
    <div id="wpac-google-review"></div>
    <div class="resenias__btn"><button class="btn nav__btn" onclick="location.href='https://maps.google.com/?cid=4998799587943471161'">{{ __('opiniones.ver') }}</button></div>
  </div>
<script type="text/javascript">
wpac_init = window.wpac_init || [];
wpac_init.push({widget: 'GoogleReview', id: 31137, place_id: 'ChIJC68IisGvUQ0ROVi9jr1NX0U', view_mode: 'list'});
(function() {
    if ('WIDGETPACK_LOADED' in window) return;
    WIDGETPACK_LOADED = true;
    var mc = document.createElement('script');
    mc.type = 'text/javascript';
    mc.async = true;
    mc.src = 'https://embed.widgetpack.com/widget.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
})();
</script>
<script>
  $(".wp-google-review").addClass("custom__review");
</script>
</section>