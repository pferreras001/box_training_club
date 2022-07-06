<section class="section section__cuotas">
  <div class="cuotas__container">
    <div data-aos="fade-up" class="cuotas__top">
      <div>
        <h1>{!! __('cuotas.quieres') !!}</h1>
        <h3>{{ __('cuotas.matricula') }}</h3>
      </div>
    </div>
  </div>
  <div class="cuotas__tarifas">
    <div class="cuotas__tarifa cuotas__tarifa--jab">
      <div data-aos="fade-right" class="cuotas__left">
        <ul>
          <li>{!! __('cuotas.mensual1') !!}</li>
          <li>{!! __('cuotas.trimestral1') !!}</li>
          <li>{!! __('cuotas.semestral1') !!}</li>
          <li>{!! __('cuotas.anual1') !!}</li>
          <li><a href="{{route('contacto')}}">{{ __('cuotas.saber') }}...</a></li>
        </ul>
      </div>
      <div data-aos="fade-left" class="cuotas__right cuotas__right--jab">
        <div class="cuotas__right__top">
          <div>
            <h1>JAB</h1>
            <h2>10 {{ __('cuotas.clase') }}</h2>   
          </div>       
        </div>
        <div class="cuotas__right__bottom">   
          <h3>{{ __('cuotas.iniciacion') }}</h3>       
        </div>
      </div>
    </div>
    <div class="cuotas__tarifa cuotas__tarifa--cross">
      <div data-aos="fade-right" class="cuotas__left">
        <ul>
          <li>{!! __('cuotas.mensual2') !!}</li>
          <li>{!! __('cuotas.trimestral2') !!}</li>
          <li>{!! __('cuotas.semestral2') !!}</li>
          <li>{!! __('cuotas.anual2') !!}</li>
          <li><a href="{{route('contacto')}}">{{ __('cuotas.saber') }}...</a></li>
        </ul>
      </div>
      <div data-aos="fade-left" class="cuotas__right cuotas__right--cross">
        <div class="cuotas__right__top">
          <div>
            <h1>CROSS</h1>
            <h2>13 {{ __('cuotas.clase') }}</h2>   
          </div>       
        </div>
        <div class="cuotas__right__bottom">   
          <h3>{{ __('cuotas.medio') }}</h3>       
        </div>
      </div>
    </div>
    <div class="cuotas__tarifa cuotas__tarifa--hook">
      <div data-aos="fade-right" class="cuotas__left">
        <ul>
          <li>{!! __('cuotas.mensual3') !!}</li>
          <li>{!! __('cuotas.trimestral3') !!}</li>
          <li>{!! __('cuotas.semestral3') !!}</li>
          <li>{!! __('cuotas.anual3') !!}</li>
          <li><a href="{{route('contacto')}}">{{ __('cuotas.saber') }}...</a></li>
        </ul>
      </div>
      <div data-aos="fade-left" class="cuotas__right cuotas__right--hook">
        <div class="cuotas__right__top">
          <div>
            <h1>HOOK</h1>
            <h2>16 {{ __('cuotas.clase') }}</h2>   
          </div>       
        </div>
        <div class="cuotas__right__bottom">   
          <h3>{{ __('cuotas.avanzado') }}</h3>       
        </div>
      </div>
    </div>
    <div class="cuotas__tarifa cuotas__tarifa--tyson">
      <div data-aos="fade-right" class="cuotas__left">
        <ul>
          <li>{!! __('cuotas.mensual4') !!}</li>
          <li>{!! __('cuotas.trimestral4') !!}</li>
          <li>{!! __('cuotas.semestral4') !!}</li>
          <li>{!! __('cuotas.anual4') !!}</li>
          <li><a href="{{route('contacto')}}">{{ __('cuotas.saber') }}...</a></li>
        </ul>
      </div>
      <div data-aos="fade-left" class="cuotas__right cuotas__right--tyson">
        <div class="cuotas__right__top">
          <div>
            <h1>TYSON</h1>
            <h2>{{ __('cuotas.ilimitado') }}</h2>   
          </div>       
        </div>
        <div class="cuotas__right__bottom">   
          <h3>{{ __('cuotas.elite') }}</h3>       
        </div>
      </div>
    </div>
  </div>
</section>