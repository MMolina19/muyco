@extends('dashboard')

@section('title',__('brands.title'))

@section('content')
<div class="row justify-content-between">
    <div class="col-md-4">
        @can('is-admin')
        <h3 class="pb-2">{{__('brands.add')}}</h3>
        <form method="POST" action="{{ route(trans('admin-urls.brands.store')) }}">
            @include('admin.brands.partials.form', ['create' => true])
        </form>
        @endcan
    </div>
    <div class="col-md-8">
        <h3 class="pb-2">{{__('brands.list')}}</h3>
        @include('admin.brands.partials.table')
    </div>
</div>
@endsection
