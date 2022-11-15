
<div class="container">
    <nav class="sub-sub-nav bg-light text-center">
        <ul>
            @foreach ($navbar as $item)
                @if($item->active)
                <li class="nav-item">
                    <a class="btn btn-outline-success {{ Route::is(__($item->route)) ? 'active' : null }}"
                        aria-current="page" href="{{ route(__($item->route)) }}">
                        {{__($item->name)}}
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>

@can('loggged-in')
@endcan
