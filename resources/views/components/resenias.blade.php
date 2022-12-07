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


<?php

/**
 * Get google reviews
 * @return array Google reviews data
 */
function get_google_reviews(){

  // URL to fetch
  $google_api = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJC68IisGvUQ0ROVi9jr1NX0U&sensor=true&key=31137';

  // Fetch reviews with cURL
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $google_api);

  $response = curl_exec($ch);
  curl_close($ch);

  // JSON decode the text to associative array
  return json_decode($response, 'assoc');
}

// Get reviews
$g_response = get_google_reviews();

// See if we got some reviews
if ($g_response && $g_response['result'] && $g_response['result']['reviews']) {
  // Loop through the reviews
  foreach ($g_response['result']['reviews'] as $review) {
    // Output HTML for reviews
    ?>
    <dl>
      <dt> date </dt>
      <dd><?php echo $review['time'] ?></dd>
      <dt> rating </dt>
      <dd><?php echo $review['rating'] ?></dd>
      <dt> name </dt>
      <dd><?php echo $review['author_name'] ?></dd>
      <dt> content </dt>
      <dd><?php echo $review['text'] ?></dd>
    </dl>
    <?php
  }
}
?>

<!-- OPTIONAL: Some styles to make things look nicer -->
<style>
  dl {
    display: flex;
    flex-wrap: wrap;
    font: 1rem/1.4 sans-serif;
    max-width: 500px;
    margin: 2em auto 3em;
  }
  dt, dd {
    margin: .5em 0;
  }
  dt {
    flex: 1 1 25%;
  }
  dd {
    flex: 1 1 75%;
  }
</style>
</section>