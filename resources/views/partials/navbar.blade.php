<nav class="brand-navbar" role="banner">
    <div class="navbar-1">
        <div class="navbar-2-center">
            <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <img src="{{asset('images/logos/muyco_logo_v1_180x180_04.png')}}"
                    height="80" alt="MuYCo Logo" />

                <div class="d-flex flex-wrap align-items-center">
                    <a class="nav-link navbar-brand" href="{{ url(__('urls.home')) }}">
                        {{ __('home.brand') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
<nav class="sub-nav">
    <div class="sub-nav-1">

        <div class="sub-nav-2-left">
            <div class="navbar-2-left-nav col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a id="arrowed-btn-toggle" class="btn btn btn-outline-dark"
                         role="button" onclick ="show()">
                        <span class="hide-when-small">
                            <i class="bi bi-arrow-right-square-fill"
                                data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvas"> {{ __('navigation.shop') }}</i>
                        </span>
                    </a>
                    <a type="button" class="btn btn-outline-dark">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="sub-nav-2-right">
            <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                @if (Route::has('login'))
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <div class="btn-group" role="group">
                        <button id="sesionDropdown" type="button" class="btn btn-outline-dark me-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i clas="fa fa-language">{{ __('navigation.language') }}</i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sesionDropdown">
                            <li>
                                <a href="{{route('language.index', 'es')}}" class="dropdown-item language{{ App::isLocale('es') ? ' active' : '' }}" rel="es-ES">
                                    {{ __('navigation.spanish') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{route('language.index', 'en')}}" class="dropdown-item language{{ App::isLocale('en') ? ' active' : '' }}" rel="en-US">
                                {{ __('navigation.english') }}
                                </a>
                            </li>
                        </ul>
                        </div>
                        <div class="btn-group" role="group">
                            <button id="loginDropdown" type="button"
                                class="btn
                                @auth
                                    @if(Auth::user()->hasAnyRole('admin') == 1)
                                    btn-warning
                                    @endif
                                    @if(Auth::user()->hasAnyRole('manufacturer') == 1)
                                    btn-light
                                    @endif
                                    @if(Auth::user()->hasAnyRole('client') == 1)
                                    btn-success
                                    @endif
                                @endauth
                                @guest
                                 btn-light
                                @endguest
                                 dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @auth
                                <img src="{{asset('images/usuarios/avatar/male-avatar.png')}}"
                                    alt="{{ Auth::user()->username }} avatar" placeholder="{{ Auth::user()->username }} avatar"
                                    class="rounded-circle right-nav-avatar">
                                {{ Auth::user()->username }}
                                @else
                                {{ __('navigation.login') }}
                                @endif
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                                @auth
                                    @if( Auth::user()->id )
                                    <li>
                                        <a class="nav-link disabled" href="#" tabindex="-1"
                                            aria-disabled="true">
                                            User id: {{Auth::user()->id}}
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                                            @if( Auth::user()->hasAnyRole('admin') == 1)
                                            {{__('auth.user-role-admin')}}
                                            @endif
                                            @if( Auth::user()->hasAnyRole('customer') == 1)
                                            {{__('auth.user-role-customer')}}
                                            @endif
                                            @if( Auth::user()->hasAnyRole('manufacturer') == 1)
                                            {{__('auth.user-role-manufacturer')}}
                                            @endif
                                        </a>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item" href="{{route(trans('urls.my-profile'))}}">
                                            {{ __('navigation.my-profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                            <i class="fa fa-btn fa-sign-out"></i> {{ __('navigation.logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item" href="{{ route('login') }}">
                                            {{ __('navigation.login')}}
                                        </a>
                                    </li>
                                    <li>
                                        @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">
                                            {{ __('navigation.sign-up')}}
                                        </a>
                                        @endif
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
</nav>

<!-- Aquí iría la subnavbar -->
