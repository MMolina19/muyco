<nav class="navbar navbar-expand-lg <!--navbar-light bg-light-->">
    <div class="container">

        <a class="navbar-brand" href="#">{{ __('home.brand') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


            @if (Route::has('login'))
                <ul class="nav justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="sesionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('navigation.language') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="sesionDropdown">
                            <a href="{{route('language.index', 'es')}}" class="dropdown-item language{{ App::isLocale('es') ? ' active' : '' }}" rel="es-ES">
                                {{ __('navigation.spanish') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{route('language.index', 'en')}}" class="dropdown-item language{{ App::isLocale('en') ? ' active' : '' }}" rel="en-US">
                                {{ __('navigation.english') }}
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="loginDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @auth
                            {{ Auth::user()->username }}
                            @else
                            {{ __('navigation.login') }}
                            @endif
                        </button>
                        <div class="dropdown-menu" aria-labelledby="loginDropdown">
                            @auth
                                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                                @if( Auth::user()->hasAnyRole('admin') == 1)
                                    Admin
                                @endif
                                @if( Auth::user()->hasAnyRole('manufacturer') == 1)
                                    Manufacturer
                                @endif
                                @if( Auth::user()->hasAnyRole('client') == 1)
                                    Client
                                @endif
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item {{ (request()->is('dashbord')) ? 'active' : '' }}" href="{{ url('/dashboard') }}">{{ __('navigation.dashboard') }}</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                    <i class="fa fa-btn fa-sign-out"></i> {{ __('navigation.logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('navigation.login')}}</a>

                                @if (Route::has('register'))
                                <a class="dropdown-item" href="{{ route('register') }}">{{ __('navigation.sign-up')}}</a>
                                @endif
                            @endauth
                        </div>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>

@can('logged-in')
<nav class="navbar sub-nav navbar-expand-lg navbar-light bg-light">
    <div class="container">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">
                        {{__('navigation.home')}}
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('users')) ? 'active' : '' }} dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('navigation.users') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                            {{ __('navigation.show') }}
                        </a>
                    </div>
                </li>
                @can('is-admin')
                @endcan
            </ul>

            <!--
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success sb-margin-right" type="submit">Search</button>
            </form>
            -->
        </div>
    </div>
</nav>
@endcan
