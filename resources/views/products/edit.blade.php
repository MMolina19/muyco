@extends('main')

@section('content')
<a class="btn btn-sm btn-success float-right"
    href="{{route(trans('urls.products'))}}" role="button">
    {{__('products.back')}}
</a>
<div class="card-light">
    <div class="card-header">
        {{__('products.edit-title')}}
    </div>
    <div class="card-body">
        <form method="POST"
            action="{{ route('products.update', $product->id) }}">
            @method('PATCH')
            @include('products.partials.form')
        </form>
    </div>
</div>
@endsection
