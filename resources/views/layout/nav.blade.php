<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="/">
            MediCheck
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    </li>
                @else
                  @if(Auth::user()->type=='admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Panel de Administrador</a>
                    </li>
                  @endif
                  @if(Auth::user()->type=='secre')
                    <li class="nav-item">
                        <a class="nav-link" href="/certificates/vender_bono">Vender Bono</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/appointments/next_day">Citas Próximo Día</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/news/menu">Administrar Noticias</a>
                    </li>
                  @endif
                  @if(Auth::user()->type=='medic')
                    <li class="nav-item">
                        <a class="nav-link" href="/medic_day">Citas del Día</a>
                    </li>
                  @endif
                  @if(Auth::user()->type=='user')
                    <li class="nav-item">
                        <a class="nav-link" href="/appointments">Mis Citas</a>
                    </li>
                  @else
                    <li class="nav-item">
                        <a class="nav-link" href="/appointments">Próximas Citas</a>
                    </li>
                  @endif
                  <li class="nav-item">
                      <a class="nav-link" href="/medics">Médicos</a>
                  </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/history/show">Historial Médico</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
