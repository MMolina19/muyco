@extends('dashboard')

@section('title',__('categories.title'))

@section('content')
<div class="row justify-content-between">
    <div class="col-md-4">
        @can('is-admin')
        <h3 class="pb-2">{{__('categories.add')}}</h3>

        <form method="POST" action="{{ route(trans('admin-urls.categories.store')) }}">
            @include('admin.categories.partials.form', ['create' => true])
        </form>
        @endcan
    </div>
    <div class="col-md-8">
        <h3 class="pb-2">{{__('categories.list')}}</h3>
        @include('admin.categories.partials.table')
    </div>
</div>
@endsection
