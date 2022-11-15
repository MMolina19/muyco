@extends('main')

@section('content')
<div class="row gx-5">
    <div class="container p-3">
        <a class="btn btn-sm btn-success float-right"
            href="{{route(trans('urls.product_types'))}}" role="button">
            {{__('product_types.back')}}
        </a>
        <div class="card-light">
            <div class="card-header">
                    {{__('product_types.create-title')}}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route(trans('urls.product_types.store')) }}">
                    @include('products_types.partials.form', ['create' => true])
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
