<section class="section section__cuotas_home">
  <div class="cuotas_home__container">
    <div data-aos="fade-up" class="cuotas_home__top">
      <div>
        <h1>{!! __('cuotas.quieres') !!}</h1>
        <h3>{{ __('cuotas.matricula') }}</h3>
      </div>
    </div>

    <a href="{{route('cuotas')}}">
      <div class="cuotas_home__tarifas">
        <div data-aos="fade-up" class="cuotas_home__tarifa cuotas_home__tarifa--jab opacity_transition">
          <div class="cuotas_home__tarifa__top">
            <div>
              <h1>JAB</h1>
              <h2>10 {{ __('cuotas.clase') }}</h2>   
            </div>       
          </div>
          <div class="cuotas_home__tarifa__bottom">   
            <h3>{{ __('cuotas.iniciacion') }}</h3>       
          </div>
        </div>
        <div data-aos="fade-up" class="cuotas_home__tarifa cuotas_home__tarifa--cross opacity_transition">
          <div class="cuotas_home__tarifa__top">
            <div>
              <h1>CROSS</h1>
              <h2>13 {{ __('cuotas.clase') }}</h2> 
            </div>         
          </div>
          <div class="cuotas_home__tarifa__bottom">   
            <h3>{{ __('cuotas.medio') }}</h3>       
          </div>
        </div>
        <div data-aos="fade-up" class="cuotas_home__tarifa cuotas_home__tarifa--hook opacity_transition">
          <div class="cuotas_home__tarifa__top">
            <div>
              <h1>HOOK</h1>
              <h2>16 {{ __('cuotas.clase') }}</h2>
            </div>          
          </div>
          <div class="cuotas_home__tarifa__bottom">   
            <h3>{{ __('cuotas.avanzado') }}</h3>       
          </div>
        </div>
        <div data-aos="fade-up" class="cuotas_home__tarifa cuotas_home__tarifa--tyson opacity_transition">
          <div class="cuotas_home__tarifa__top">
            <div>
              <h1>TYSON</h1>
              <h2>{{ __('cuotas.ilimitado') }}</h2>
            </div>         
          </div>
          <div class="cuotas_home__tarifa__bottom">   
            <h3>{{ __('cuotas.elite') }}</h3>       
          </div>
        </div>
      </div>
    </a>
  </div>
</section>