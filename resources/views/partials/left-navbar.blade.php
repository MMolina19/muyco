<div class="offcanvas
    @auth offcanvas-user-logged @else offcanvas-guest @endauth offcanvas-start w-15 bg-dark"
    tabindex="-1" id="offcanvas"
    data-bs-keyboard="false"
     data-bs-backdrop="false">
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            @foreach ($navbar as $item)
                @if($item->active)

                        <li>
                            <a href="{{ route(__($item->route)) }}"
                            class="nav-link text-truncate {{ (request()->is(__($item->route))) ? 'active' : '' }}">
                                @if ($item->image_type =='img')
                                    <img src="{{asset($item->image_src)}}"
                                        class="{{$item->image_class}}" />
                                @else
                                    <i class="{{$item->image_class}}"></i>
                                @endif
                                <span class="ms-1 d-none d-sm-inline">
                                    {{__($item->name)}}
                                </span>
                            </a>
                        </li>

                @endif
            @endforeach
        </ul>
    </div>
    <div class="nav-link dropdown pb-4">
        @if(Route::has('login'))
            @auth
            <a href="#" class="dropdown-toggle d-flex text-center align-items-center text-white
                text-decoration-none" role="button" id="userLoggedIn" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="{{asset('images/usuarios/avatar/male-avatar.png')}}"
                    alt="{{ Auth::user()->username }} avatar"
                    placeholder="{{ Auth::user()->username }} avatar" width="30" height="30"
                    class="rounded-circle left-nav-avatar">
                {{ Auth::user()->username }}
            </a>
            @else
            <a href="{{route('login')}}"
                class="d-flex text-center align-items-center text-white
                text-decoration-none">
                <i class="fa fa-btn fa-sign-in"></i>
                <span class="ms-1 d-none d-sm-inline">
                    {{ __('navigation.login') }}
                </span>
            </a>
            @endauth
            @auth
            <ul class="dropdown-menu dropdown-menu-dark align-items-center text-small shadow"
                aria-labelledby="userLoggedIn">
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
                <li>
                    <a class="dropdown-item" href="{{route(__('urls.my-profile'))}}">
                        {{ __('navigation.my-profile') }}
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('left-logout-form').submit();" >
                        <i class="fa fa-btn fa-sign-out"></i> {{ __('navigation.logout') }}
                    </a>
                    <form id="left-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            @endauth
            @can('is-admin')

            @endcan
        @endif
    </div>
</div>
