@extends('main')

@section('title',__('collections.title'))

@section('content')

@include('collections.partials.nav')

@auth
<div class="row gx-5">
    <div class="container">
        @can('is-admin')
        <a class="btn btn-sm btn-success mt-0 mb-3 float-right"
        href="{{route(trans('urls.collections.create'))}}" role="button">
            {{__('collections.create')}}
        </a>
        @endcan
    </div>
</div>
<div class="row gx-5">
    <div class="container">
        @include('collections.partials.accordion')
        @yield('accordion')
    </div>
</div>
@endauth

@guest
<!-- Gallery -->
<div class="row gx-5">
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Boat on Calm Water"
    />

    <img
        src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Wintry Mountain Landscape"
    />
    </div>

    <div class="col-lg-4 mb-4 mb-lg-0">
    <img
        src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Mountains in the Clouds"
    />

    <img
        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Boat on Calm Water"
    />
    </div>

    <div class="col-lg-4 mb-4 mb-lg-0">
    <img
        src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(18).webp"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Waves at Sea"
    />

    <img
        src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain3.webp"
        class="w-100 shadow-1-strong rounded mb-4"
        alt="Yosemite National Park"
    />
    </div>
</div>
<!-- Gallery -->
@endguest



@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/collections.js')}}"></script>
@stop
