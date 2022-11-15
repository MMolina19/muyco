@extends('main')

@section('title',__('images.title'))

@section('content')
<!--<div class="row">
    <div class="col-12">
        {{ Breadcrumbs::render('products',$products) }}
    </div>
</div>-->
<div class="row">
    <div class="col-12">
        <h1 class="float-left">{{__('images.title')}}</h1>
        @can('is-admin')
        <a class="btn btn-sm btn-success float-right"
        href="{{route('images.create')}}" role="button">
            {{__('images.create')}}
        </a>
        @endcan
    </div>
    <div class="col-lg-12 text-center">
        <!--
        <div class="card">
            @include('collection_images.partials.accordion')
            @yield('accordion')
        </div>-->
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{URL::asset('js/images.js')}}"></script>
@stop
