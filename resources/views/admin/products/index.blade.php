@extends('dashboard')

@section('title',__('products.title'))

@section('content')
<div class="row justify-content-between">
    <div class="col-md-4">
        @can('is-admin')
        <h3 class="pb-2">{{__('products.add')}}</h3>

        <form
            method="POST"
            action="{{ route(trans('admin-urls.products.store')) }}"
            enctype="multipart/form-data"
        >
            @include('admin.products.partials.form', ['create' => true])
        </form>
        @endcan
    </div>
    <div class="col-md-8">
        <h3 class="pb-2">{{__('products.list')}}</h3>

        @include('admin.products.partials.table')
    </div>
</div>
@endsection
