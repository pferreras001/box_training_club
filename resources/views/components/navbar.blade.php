<nav>
    <div class="nav-wrapper">
        <div class="brand">
            <a href="{{ route('inicio') }}"><?php require('svg/navbar/logo.svg')?></a>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <ul class="nav-list">
            <li class="{{ (Request::route()->getName()=='inicio') ? 'active' : '' }}">
                <a href="{{ route('inicio') }}">Inicio</a>
            </li>
            <li class="{{ (Request::route()->getName()=='horarios') ? 'active' : '' }}">
              <a href="{{ route('horarios') }}">Horarios</a>
            </li>
            <li class="{{ (Request::route()->getName()=='actividades') ? 'active' : '' }}">
                <a href="{{ route('actividades') }}">Actividades</a>
            </li>
            <li class="{{ (Request::route()->getName()=='cuotas') ? 'active' : '' }}">
              <a href="{{ route('cuotas') }}">Cuotas</a>
            </li>
            <li class="{{ (Request::route()->getName()=='blog') ? 'active' : '' }}">
              <a href="{{ route('blog') }}">Blog</a>
            </li>
            <li class="{{ (Request::route()->getName()=='galeria') ? 'active' : '' }}">
              <a href="{{ route('galeria') }}">Galeria</a>
            </li>
            <li class="{{ (Request::route()->getName()=='tienda') ? 'active' : '' }}">
              <a href="{{ route('tienda') }}">Tienda</a>
            </li>
            <li class="{{ (Request::route()->getName()=='contacto') ? 'active' : '' }}">
              <a href="{{ route('contacto') }}">Contacto</a>
            </li>
            @auth
            <!--
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label"><button>Box Famility</span> <span class="caret"></span></button></a>
                <ul class="dropdown-menu">
                    @if(session('tipo')!='admin')
                    <li><a href="{{ route('perfil') }}">Perfil</a></li>
                    <li><a href="{{ route('colaboradores') }}">Colaboradores</a></li>
                    <li><a href="#">Normativa</a></li>
                    <li><a href="#">Reservas</a></li>
                    @else
                    <li><a href="{{ route('users') }}">Gestionar usuarios</a></li>
                    <li><a href="{{ route('dar_alta') }}">Dar de alta</a></li>
                    <li><a href="{{ route('gestionar_colaboradores') }}">Gestionar colaboradores</a></li>
                    @endif
                </ul>
            </li>
            -->
            <li>
                <form action="{{ route('logout') }}" method="post">
                  @csrf
                    @method('put')
                     <button class="btn nav__btn">Cerrar Sesión</button>
                </form>  
            </li>
            @else
            <li>
                <button class="btn nav__btn" onclick="location.href='{{ route('login') }}'">Box Famility</button>
            </li>
            @endif
        </ul>
    </div>
</nav>

<script type="text/javascript">
  window.addEventListener('resize', function(){
    addRequiredClass();
})


function addRequiredClass() {
    if (window.innerWidth < 860) {
        document.body.classList.add('mobile')
    } else {
        document.body.classList.remove('mobile') 
    }
}

window.onload = addRequiredClass

let hamburger = document.querySelector('.hamburger')
let mobileNav = document.querySelector('.nav-list')

let bars = document.querySelectorAll('.hamburger span')

let isActive = false

hamburger.addEventListener('click', function() {
    mobileNav.classList.toggle('open')
    if(!isActive) {
        bars[0].style.transform = 'rotate(45deg)'
        bars[1].style.opacity = '0'
        bars[2].style.transform = 'rotate(-45deg)'
        isActive = true
    } else {
        bars[0].style.transform = 'rotate(0deg)'
        bars[1].style.opacity = '1'
        bars[2].style.transform = 'rotate(0deg)'
        isActive = false
    }
    

})
</script>
