@extends('main')

@section('content')
<div class="row gx-5">
    <div class="container p-3">
        <a class="btn btn-sm btn-success float-right"
            href="{{route(trans('urls.products'))}}" role="button">
            {{__('products.back')}}
        </a>
        <div class="card-light">
            <div class="card-header">
                    {{__('products.create-title')}}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route(trans('urls.products.store')) }}">
                    @include('products.partials.form', ['create' => true])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
