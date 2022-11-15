@extends('dashboard')

@section('content')

    <a class="btn btn-sm btn-success float-right"
        href="{{ route(trans('admin-urls.products.index')) }}" role="button">
        {{__('products.back')}}
    </a>
    <div class="card-light">
        <div class="card-header">
                {{__('products.create-title')}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route(trans('admin-urls.products.store')) }}">
                @include('admin.products.partials.form', ['create' => true])
            </form>
        </div>
    </div>

@endsection
