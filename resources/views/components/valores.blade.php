<section class="section section__valores valores">
  <div class="valores__container">
    <div data-aos="fade-right" class="valores__hexagons">

      <div class="valores__hexagons__small">
        <div id="box_10" class="box box__gray blink" onclick="step('#box_10','#box_11')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info big__padding">
            <h1>{{ __('valores.como') }}</h1>
            <ul>
              <li>+ {{ __('valores.valor_coach') }}</li>
              <li>+ {{ __('valores.formacion') }}</li>
              <li>+ {{ __('valores.conocimiento') }}</li>
              <li>+ {{ __('valores.experiencia') }}</li>
              <li>+ {{ __('valores.servicio') }}</li>
              <li>+ {{ __('valores.apoyo') }}</li>
            </ul>
          </div>
        </div>
        <div id="box_11"  class="box box__white blocked" onclick="step('#box_11','#box_12')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info big__padding">
            <h3>{{ __('valores.metodologia') }}</h3>
            <ul>
              <li>+ {{ __('valores.cruzada') }}</li>
              <li>+ {{ __('valores.disruptiva') }}</li>
              <li>+ {{ __('valores.mejora') }}</li>
              <li>+ {{ __('valores.excelencia') }}</li>
            </ul>
          </div>
        </div>
        <div id="box_12" class="box box__white blocked" onclick="step('#box_12','#box_13')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info big__padding">
            <h3>{{ __('valores.equipamiento') }}</h3>
            <ul>
              <li>+ {{ __('valores.completo') }}</li>
              <li>+ {{ __('valores.variado') }}</li>
              <li>+ {{ __('valores.novedoso') }}</li>
              <li>+ {{ __('valores.tecnologia') }}</li>
            </ul>
          </div>
        </div>
        <div id="box_13" class="box box__yellow blocked" onclick="step('#box_13','#box_14')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info small__padding">
            <?php require('svg/valores/superacion.svg')?>
            <h2>01.</h2>
            <h3>{{ __('valores.superacion') }}</h3>
            <ul>
              <li>+ {{ __('valores.valor_artes') }}</li>
              <li>+ {{ __('valores.aprendizaje') }}</li>
              <li>+ {{ __('valores.fortalecimiento') }}</li>
            </ul>
          </div>
        </div>
        <div id="box_14" class="box box__yellow blocked" onclick="step('#box_14','#box_15')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info small__padding">
            <?php require('svg/valores/golpeo.svg')?>
            <h2>02.</h2>
            <h3>{{ __('valores.golpeo') }}</h3>
            <ul>
              <li>+ BOXEO</li>
              <li>+ THAIBOXING</li>
              <li>+ TAEKWONDO</li>
            </ul>
          </div>
        </div>
        <div id="box_15" class="box box__yellow blocked" onclick="step('#box_15','#box_16')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info small__padding">
            <?php require('svg/valores/entrenamiento_funcional.svg')?>
            <h2>03.</h2>
            <h3>{{ __('valores.entrenamiento') }}</h3>
            <ul>
              <li>+ FIGHTER FITNESS</li>
              <li>+ CROSS TRINING</li>
            </ul>
          </div>
        </div>
        <div id="box_16" class="box box__yellow blocked" onclick="step('#box_16','#box_17')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info small__padding">
            <?php require('svg/valores/diversion.svg')?>
            <h2>04.</h2>
            <h3>{{ __('valores.diversion') }}</h3>
            <ul>
              <li>+ {{ __('valores.entre_var') }}</li>
              <li>+ TOP PLAYLISTS</li>
            </ul>
          </div>
        </div>
        <div id="box_17" class="box box__yellow blocked" onclick="step('#box_17','#box_18')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info small__padding">
            <?php require('svg/valores/famility.svg')?>
            <h2>05.</h2>
            <h3>FAMILITY</h3>
            <ul>
              <li>+ {{ __('valores.ambiente') }}</li>
            </ul>
          </div>
        </div>
        <div id="box_18" class="box box__gray blocked" onclick="showLema('#box_18')">
          <?php require('svg/valores/hexagon.svg')?>
          <div class="box__info medium__padding">
            <?php require('svg/valores/resultados.svg')?>
            <h3>{{ __('valores.resultados') }}</h3>
            <ul>
              <li>+ {{ __('valores.vitalidad') }}</li>
              <li>+ {{ __('valores.autoconfianza') }}</li>
              <li>+ {{ __('valores.salud') }}</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="valores__hexagons__big">
        <div class="row_1 row__impar row">
          <div id="box_1" class="box box__gray blink" onclick="step('#box_1','#box_2')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info big__padding">
              <h1>{{ __('valores.como') }}</h1>
              <ul>
                <li>+ {{ __('valores.valor_coach') }}</li>
                <li>+ {{ __('valores.formacion') }}</li>
                <li>+ {{ __('valores.conocimiento') }}</li>
                <li>+ {{ __('valores.experiencia') }}</li>
                <li>+ {{ __('valores.servicio') }}</li>
                <li>+ {{ __('valores.apoyo') }}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row_2 row__par row">
          <div id="box_2"  class="box box__white blocked" onclick="step('#box_2','#box_3')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info big__padding">
              <h3>{{ __('valores.metodologia') }}</h3>
              <ul>
                <li>+ {{ __('valores.cruzada') }}</li>
                <li>+ {{ __('valores.disruptiva') }}</li>
                <li>+ {{ __('valores.mejora') }}</li>
                <li>+ {{ __('valores.excelencia') }}</li>
              </ul>
            </div>
          </div>
          <div id="box_3" class="box box__white blocked" onclick="step('#box_3','#box_4')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info big__padding">
              <h3>{{ __('valores.equipamiento') }}</h3>
              <ul>
                <li>+ {{ __('valores.completo') }}</li>
                <li>+ {{ __('valores.variado') }}</li>
                <li>+ {{ __('valores.novedoso') }}</li>
                <li>+ {{ __('valores.tecnologia') }}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row_3 row__impar row">
          <div id="box_4" class="box box__yellow blocked" onclick="step('#box_4','#box_5')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info small__padding">
              <?php require('svg/valores/superacion.svg')?>
              <h2>01.</h2>
              <h3>{{ __('valores.superacion') }}</h3>
              <ul>
                <li>+ {{ __('valores.valor_artes') }}</li>
                <li>+ {{ __('valores.aprendizaje') }}</li>
                <li>+ {{ __('valores.fortalecimiento') }}</li>
              </ul>
            </div>
          </div>
          <div id="box_6" class="box box__yellow blocked" onclick="step('#box_6','#box_7')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info small__padding">
              <?php require('svg/valores/entrenamiento_funcional.svg')?>
              <h2>03.</h2>
              <h3>{{ __('valores.entrenamiento') }}</h3>
              <ul>
                <li>+ FIGHTER FITNESS</li>
                <li>+ CROSS TRAINING</li>
              </ul>
            </div>
          </div>
          <div id="box_8" class="box box__yellow blocked" onclick="step('#box_8','#box_9')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info small__padding">
              <?php require('svg/valores/famility.svg')?>
              <h2>05.</h2>
              <h3>FAMILITY</h3>
              <ul>
                <li>+ {{ __('valores.ambiente') }}</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row_4 row__impar row">
          <div id="box_5" class="box box__yellow blocked" onclick="step('#box_5','#box_6')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info small__padding">
              <?php require('svg/valores/golpeo.svg')?>
              <h2>02.</h2>
              <h3>{{ __('valores.golpeo') }}</h3>
              <ul>
                <li>+ BOXEO</li>
                <li>+ THAIBOXING</li>
                <li>+ TAEKWONDO</li>
              </ul>
            </div>
          </div>
          <div id="box_7" class="box box__yellow blocked" onclick="step('#box_7','#box_8')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info small__padding">
              <?php require('svg/valores/diversion.svg')?>
              <h2>04.</h2>
              <h3>{{ __('valores.diversion') }}</h3>
              <ul>
                <li>+ {{ __('valores.entre_var') }}</li>
                <li>+ TOP PLAYLISTS</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row_5 row__impar row">
          <div id="box_9" class="box box__gray blocked" onclick="showLema('#box_9')">
            <?php require('svg/valores/hexagon.svg')?>
            <div class="box__info medium__padding">
              <?php require('svg/valores/resultados.svg')?>
              <h3>{{ __('valores.resultados') }}</h3>
              <ul>
                <li>+ {{ __('valores.vitalidad') }}</li>
                <li>+ {{ __('valores.autoconfianza') }}</li>
                <li>+ {{ __('valores.salud') }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <h2 class="lema hidden">{{ __('valores.fortalecer') }}</h2>
    </div>
    <div data-aos="fade-left" class="valores__title">
      <h1>{{ __('valores.que_es') }}<span> Box Training Club?</span></h1>
    </div>
  </div>
<script>
function step(selfItem, nextItem) {
  $(selfItem).removeClass("blink");
  $(nextItem).removeClass("blocked");
  $(nextItem).addClass("blink");
  $(selfItem).attr('onclick','');
}

function showLema(selfItem){
  $(selfItem).removeClass("blink")
  $('.lema').removeClass("hidden");
  $('.lema').addClass("visible");
}
</script>
</section>